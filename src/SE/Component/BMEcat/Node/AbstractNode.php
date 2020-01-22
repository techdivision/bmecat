<?php


namespace SE\Component\BMEcat\Node;

use ReflectionException;
use ReflectionMethod;
use SE\Component\BMEcat\Exception\InvalidSetterException;
use SE\Component\BMEcat\Exception\UnknownKeyException;

/**
 *
 * @package SE\Component\BMEcat
 */
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
            } catch (ReflectionException $e) {
                throw new InvalidSetterException('Reflecting the setter method '.$instance.'::'.$setterName.' failed.');
            }
            $firstSetterParam = array_shift($setterParams);
            if (!$firstSetterParam) {
                throw new InvalidSetterException('The setter for the property '.$name.' in the class '.get_class($instance).' must have exactly one argument.');
            }

            if (!$firstSetterParam->getType()) {
                throw new InvalidSetterException('The setter for the property '.$name.' in the class '.get_class($instance).' must have exactly one argument and this argument must have a type hint.');
            }

            $paramType = $firstSetterParam->getType()->getName();

            switch ($paramType) {
                case 'array':
                    // the setter requires an array
                    break;
                default:
                    // the setter requires an object, but we currently have an array
                    // try to construct the correct object
                    $value = forward_static_call([$paramType, 'fromArray'], $value);
            }

            $instance->$setterName($value);
        }

        return $instance;
    }
}
