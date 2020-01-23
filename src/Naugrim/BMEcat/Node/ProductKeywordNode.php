<?php

namespace Naugrim\BMEcat\Node;

use /** @noinspection PhpUnusedAliasInspection */
    \JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("KEYWORD")
 */
class ProductKeywordNode extends AbstractNode
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
     * @return ProductKeywordNode
     */
    public function setValue($value) : ProductKeywordNode
    {
        $this->value = $value;
        return $this;
    }
}
