<?php


namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("FEATURE")
 */
class ProductFeatureNode implements Contracts\NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FNAME")
     *
     * @var string
     */
    protected $name;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("VARIANTS")
     * @Serializer\SkipWhenEmpty
     * @Serializer\Exclude(if="!empty(object.getValue())")
     *
     * @var string
     */
    protected $variants;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FVALUE")
     * @Serializer\Exclude(if="!empty(object.getVariants())")
     *
     * @var string
     */
    protected $value;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FUNIT")
     *
     * @var string
     */
    protected $unit;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FORDER")
     *
     * @var string
     */
    protected $order;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FDESCR")
     *
     * @var string
     */
    protected $description;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FVALUE_DETAILS")
     *
     * @var string
     */
    protected $valueDetails;

    /**
     * @param mixed $name
     * @return ProductFeatureNode
     */
    public function setName($name) : ProductFeatureNode
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $variants
     * @return ProductFeatureNode
     */
    public function setVariants($variants) : ProductFeatureNode
    {
        $this->variants = $variants;
        return $this;
    }

    /**
     * @param string $value
     * @return ProductFeatureNode
     */
    public function setValue($value) : ProductFeatureNode
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param string $unit
     * @return ProductFeatureNode
     */
    public function setUnit($unit) : ProductFeatureNode
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @param string $order
     * @return ProductFeatureNode
     */
    public function setOrder($order) : ProductFeatureNode
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @param string $description
     * @return ProductFeatureNode
     */
    public function setDescription($description) : ProductFeatureNode
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string $valueDetails
     * @return ProductFeatureNode
     */
    public function setValueDetails($valueDetails) : ProductFeatureNode
    {
        $this->valueDetails = $valueDetails;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getVariants()
    {
        return $this->variants;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getValueDetails()
    {
        return $this->valueDetails;
    }
}
