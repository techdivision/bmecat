<?php


namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("PRODUCT_PRICE")
 */
class ProductPrice implements Contracts\NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("price_type")
     * @Serializer\XmlAttribute
     *
     * @var string
     */
    protected $type = 'gros_list';

    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("PRICE_AMOUNT")
     * @Serializer\XmlElement(cdata=false)
     *
     * @var float
     */
    protected $price;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PRICE_CURRENCY")
     *
     * @var string
     */
    protected $currency = 'EUR';

    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("PRICE_FACTOR")
     *
     * @var float
     */
    protected $priceFactor;

    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("LOWER_BOUND")
     *
     * @var float
     */
    protected $lowerBound;

    /**
     *
     * @param string $currency
     * @return ProductPrice
     */
    public function setCurrency($currency) : ProductPrice
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     *
     * @param float $price
     * @return ProductPrice
     */
    public function setPrice($price) : ProductPrice
    {
        $this->price = $price;
        return $this;
    }

    /**
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $type
     * @return ProductPrice
     */
    public function setType(string $type): ProductPrice
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param float $priceFactor
     * @return ProductPrice
     */
    public function setPriceFactor(float $priceFactor): ProductPrice
    {
        $this->priceFactor = $priceFactor;
        return $this;
    }

    /**
     * @return float
     */
    public function getPriceFactor(): float
    {
        return $this->priceFactor;
    }

    /**
     * @param float $lowerBound
     * @return ProductPrice
     */
    public function setLowerBound(float $lowerBound): ProductPrice
    {
        $this->lowerBound = $lowerBound;
        return $this;
    }

    /**
     * @return float
     */
    public function getLowerBound(): float
    {
        return $this->lowerBound;
    }
}
