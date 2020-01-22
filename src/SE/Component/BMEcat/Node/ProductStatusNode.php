<?php

namespace SE\Component\BMEcat\Node;

use \JMS\Serializer\Annotation as Serializer;

/**
 *
 * @package SE\Component\BMEcat
 * @author Jochen Pfaeffle <jochen.pfaeffle.dev@gmail.com>
 *
 * @Serializer\XmlRoot("PRODUCT_STATUS")
 */
class ProductStatusNode extends AbstractNode
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute
     *
     * @var string
     */
    protected $type = '';

    /**
     * @Serializer\XmlValue
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $value = '';

    /**
     * @param string $type
     * @return ProductStatusNode
     */
    public function setType($type) : ProductStatusNode
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return ProductStatusNode
     */
    public function setValue(string $value): ProductStatusNode
    {
        $this->value = $value;
        return $this;
    }
}