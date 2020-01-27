<?php


namespace Naugrim\BMEcat\Nodes;

use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use ReflectionException;
use ReflectionMethod;

abstract class AbstractNode implements NodeInterface
{
    /**
     * @param array $data
     * @return static
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public static function fromArray(array $data) : self
    {
        $instance = new static;
        foreach ($data as $name => $value) {
            $setterName = 'set'.ucfirst($name);
            if (!method_exists($instance, $setterName)) {
                throw new UnknownKeyException('There is no setter for the property '.$name.' in the class '.get_class($instance));
            }

            if (is_scalar($value) || is_object($value)) {
                $instance->$setterName($value);
                continue;
            }


            // if the value is an array, try to recursively contruct the object

            try {
                $reflectionMethod = new ReflectionMethod($instance, $setterName);
                $setterParams = $reflectionMethod->getParameters();
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new InvalidSetterException('Reflecting the setter method '.$instance.'::'.$setterName.' failed.');
            }
            // @codeCoverageIgnoreEnd
            $firstSetterParam = array_shift($setterParams);
            if (!$firstSetterParam) {
                throw new InvalidSetterException('The setter for the property '.$name.' in the class '.get_class($instance).' must have exactly one argument.');
            }

            if (!$firstSetterParam->getType()) {
                throw new InvalidSetterException('The setter for the property '.$name.' in the class '.get_class($instance).' must have exactly one argument and this argument must have a type hint.');
            }

            $paramType = $firstSetterParam->getType()->getName();
            $valueType = gettype($value);

            if ($paramType !== $valueType && class_exists($paramType)) {
                $value = forward_static_call([$paramType, 'fromArray'], $value);
            }

            $instance->$setterName($value);
        }

        return $instance;
    }
}
