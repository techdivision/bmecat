<?php

namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    \JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("KEYWORD")
 */
class ProductKeyword implements Contracts\NodeInterface
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlValue
     *
     * @var string
     */
    protected $value = '';

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return ProductKeyword
     */
    public function setValue($value) : ProductKeyword
    {
        $this->value = $value;
        return $this;
    }
}
