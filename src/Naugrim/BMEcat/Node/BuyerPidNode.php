<?php

namespace Naugrim\BMEcat\Node;

use /** @noinspection PhpUnusedAliasInspection */
    \JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("BUYER_PID")
 */
class BuyerPidNode extends AbstractNode
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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BuyerPidNode
     */
    public function setType($type) : BuyerPidNode
    {
        $this->type = $type;
        return $this;
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
     * @return BuyerPidNode
     */
    public function setValue(string $value): BuyerPidNode
    {
        $this->value = $value;
        return $this;
    }
}
