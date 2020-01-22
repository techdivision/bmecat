<?php

namespace SE\Component\BMEcat\Node;

use /** @noinspection PhpUnusedAliasInspection */
    \JMS\Serializer\Annotation as Serializer;

/**
 *
 * @package SE\Component\BMEcat
 * @author Jochen Pfaeffle <jochen.pfaeffle.dev@gmail.com>
 *
 * @Serializer\XmlRoot("PRODUCT_ORDER_DETAILS")
 */
class ProductOrderDetailsNode extends AbstractNode
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDER_UNIT")
     *
     * @var string
     */
    protected $orderUnit;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CONTENT_UNIT")
     *
     * @var string
     */
    protected $contentUnit;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("NO_CU_PER_OU")
     * @Serializer\XmlElement(cdata=false)
     *
     * @var float
     */
    protected $noCuPerOu = 1;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PRICE_QUANTITY")
     * @Serializer\XmlElement(cdata=false)
     *
     * @var float
     */
    protected $priceQuantity = 1;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("QUANTITY_MIN")
     * @Serializer\XmlElement(cdata=false)
     *
     * @var int
     */
    protected $quantityMin = 1;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("QUANTITY_INTERVAL")
     * @Serializer\XmlElement(cdata=false)
     *
     * @var int
     */
    protected $quantityInterval = 1;

    /**
     * @return string
     */
    public function getOrderUnit()
    {
        return $this->orderUnit;
    }

    /**
     * @param string $orderUnit
     * @return ProductOrderDetailsNode
     */
    public function setOrderUnit($orderUnit) : ProductOrderDetailsNode
    {
        $this->orderUnit = $orderUnit;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentUnit()
    {
        return $this->contentUnit;
    }

    /**
     * @param string $contentUnit
     * @return ProductOrderDetailsNode
     */
    public function setContentUnit($contentUnit) : ProductOrderDetailsNode
    {
        $this->contentUnit = $contentUnit;
        return $this;
    }

    /**
     * @return float
     */
    public function getNoCuPerOu()
    {
        if ($this->noCuPerOu === null) {
            return 1;
        }
        return $this->noCuPerOu;
    }

    /**
     * @param float $noCuPerOu
     * @return ProductOrderDetailsNode
     */
    public function setNoCuPerOu($noCuPerOu) : ProductOrderDetailsNode
    {
        $this->noCuPerOu = $noCuPerOu;
        return $this;
    }

    /**
     * @return float
     */
    public function getPriceQuantity()
    {
        if ($this->priceQuantity === null) {
            return 1;
        }
        return $this->priceQuantity;
    }

    /**
     * @param float $priceQuantity
     * @return ProductOrderDetailsNode
     */
    public function setPriceQuantity($priceQuantity) : ProductOrderDetailsNode
    {
        $this->priceQuantity = $priceQuantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantityMin()
    {
        if ($this->quantityMin === null) {
            return 1;
        }
        return $this->quantityMin;
    }

    /**
     * @param int $quantityMin
     * @return ProductOrderDetailsNode
     */
    public function setQuantityMin($quantityMin) : ProductOrderDetailsNode
    {
        $this->quantityMin = $quantityMin;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantityInterval()
    {
        if ($this->quantityInterval === null) {
            return 1;
        }
        return $this->quantityInterval;
    }

    /**
     * @param int $quantityInterval
     * @return ProductOrderDetailsNode
     */
    public function setQuantityInterval($quantityInterval) : ProductOrderDetailsNode
    {
        $this->quantityInterval = $quantityInterval;
        return $this;
    }
}
