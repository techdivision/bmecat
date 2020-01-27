<?php

namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    \JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("PRODUCT_STATUS")
 */
class ProductStatus implements Contracts\NodeInterface
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
     * @return ProductStatus
     */
    public function setType($type) : ProductStatus
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
     * @return ProductStatus
     */
    public function setValue(string $value): ProductStatus
    {
        $this->value = $value;
        return $this;
    }
}
