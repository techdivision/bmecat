<?php


namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("PRODUCT_DETAILS")
 */
class ProductDetails implements Contracts\NodeInterface
{
    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DESCRIPTION_SHORT")
     *
     * @var string
     */
    protected $descriptionShort = '';

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DESCRIPTION_LONG")
     *
     * @var string
     */
    protected $descriptionLong;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EAN")
     *
     * @var string
     */
    protected $ean;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SUPPLIER_ALT_PID")
     *
     * @var string
     */
    protected $supplierAltPid;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("array<Naugrim\BMEcat\Nodes\BuyerPidNode>")
     * @Serializer\XmlList(inline=true, entry="BUYER_PID")
     *
     * @var BuyerPid[]
     */
    protected $buyerPids;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MANUFACTURER_PID")
     *
     * @var string
     */
    protected $manufacturerPid;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MANUFACTURER_NAME")
     *
     * @var string
     */
    protected $manufacturerName;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MANUFACTURER_TYPE_DESCR")
     *
     * @var string
     */
    protected $manufacturerTypeDescription;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ERP_GROUP_BUYER")
     *
     * @var string
     */
    protected $erpGroupBuyer;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ERP_GROUP_SUPPLIER")
     *
     * @var string
     */
    protected $erpGroupSupplier;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("DELIVERY_TIME")
     * @Serializer\XmlElement(cdata=false)
     *
     * @var float
     */
    protected $deliveryTime;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("array<Naugrim\BMEcat\Nodes\SpecialTreatmentClassNode>")
     * @Serializer\XmlList(inline=true, entry="SPECIAL_TREATMENT_CLASS")
     *
     * @var SpecialTreatmentClassNode[]
     */
    protected $specialTreatmentClasses;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("array<Naugrim\BMEcat\Nodes\ProductKeyword>")
     * @Serializer\XmlList(inline=true, entry="KEYWORD")
     *
     * @var ProductKeyword[]
     */
    protected $keywords;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("REMARKS")
     *
     * @var string
     */
    protected $remarks;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SEGMENT")
     *
     * @var string
     */
    protected $segment;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("int")
     * @Serializer\SerializedName("PRODUCT_ORDER")
     * @Serializer\XmlElement(cdata=false)
     *
     * @var int
     */
    protected $productOrder;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("array<Naugrim\BMEcat\Nodes\ProductStatusNode>")
     * @Serializer\XmlList(inline=true, entry="PRODUCT_STATUS")
     *
     * @var ProductStatusNode[]
     */
    protected $productStatus;

    /**
     * @param BuyerPid $buyerAid
     * @return ProductDetails
     */
    public function addBuyerPid(BuyerPid $buyerAid) : ProductDetails
    {
        if ($this->buyerPids === null) {
            $this->buyerPids = [];
        }
        $this->buyerPids[] = $buyerAid;
        return $this;
    }

    /**
     * @param SpecialTreatmentClassNode $specialTreatmentClass
     * @return ProductDetails
     */
    public function addSpecialTreatmentClass(SpecialTreatmentClassNode $specialTreatmentClass) : ProductDetails
    {
        if ($this->specialTreatmentClasses === null) {
            $this->specialTreatmentClasses = [];
        }
        $this->specialTreatmentClasses[] = $specialTreatmentClass;
        return $this;
    }

    /**
     * @param ProductKeyword $keyword
     * @return ProductDetails
     */
    public function addKeyword(ProductKeyword $keyword) : ProductDetails
    {
        if ($this->keywords === null) {
            $this->keywords = [];
        }
        $this->keywords[] = $keyword;
        return $this;
    }

    /**
     * @param ProductStatusNode $productStatus
     * @return ProductDetails
     */
    public function addProductStatus(ProductStatusNode $productStatus) : ProductDetails
    {
        if ($this->productStatus === null) {
            $this->productStatus = [];
        }
        $this->productStatus[] = $productStatus;
        return $this;
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     * @return ProductDetails
     */
    public function nullBuyerPids() : ProductDetails
    {
        if (empty($this->buyerPids) === true) {
            $this->buyerPids = null;
        }

        return $this;
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     * @return ProductDetails
     */
    public function nullSpecialTreatmentClasses() : ProductDetails
    {
        if (empty($this->specialTreatmentClasses) === true) {
            $this->specialTreatmentClasses = null;
        }
        return $this;
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     * @return ProductDetails
     */
    public function nullKeywords() : ProductDetails
    {
        if (empty($this->keywords) === true) {
            $this->keywords = null;
        }
        return $this;
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     * @return ProductDetails
     */
    public function nullProductStatus() : ProductDetails
    {
        if (empty($this->productStatus) === true) {
            $this->productStatus = null;
        }
        return $this;
    }

    /**
     * @param string $descriptionShort
     * @return ProductDetails
     */
    public function setDescriptionShort($descriptionShort) : ProductDetails
    {
        $this->descriptionShort = $descriptionShort;
        return $this;
    }

    /**
     * @param string $descriptionLong
     * @return ProductDetails
     */
    public function setDescriptionLong($descriptionLong) : ProductDetails
    {
        $this->descriptionLong = $descriptionLong;
        return $this;
    }

    /**
     * @param string $ean
     * @return ProductDetails
     */
    public function setEan($ean) : ProductDetails
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     * @param string $supplierAltPid
     * @return ProductDetails
     */
    public function setSupplierAltPid($supplierAltPid) : ProductDetails
    {
        $this->supplierAltPid = $supplierAltPid;
        return $this;
    }

    /**
     * @param string $manufacturerPid
     * @return ProductDetails
     */
    public function setManufacturerPid($manufacturerPid) : ProductDetails
    {
        $this->manufacturerPid = $manufacturerPid;
        return $this;
    }

    /**
     * @param string $manufacturerName
     * @return ProductDetails
     */
    public function setManufacturerName($manufacturerName) : ProductDetails
    {
        $this->manufacturerName = $manufacturerName;
        return $this;
    }

    /**
     * @param string $manufacturerTypeDescription
     * @return ProductDetails
     */
    public function setManufacturerTypeDescription($manufacturerTypeDescription) : ProductDetails
    {
        $this->manufacturerTypeDescription = $manufacturerTypeDescription;
        return $this;
    }

    /**
     * @param string $erpGroupBuyer
     * @return ProductDetails
     */
    public function setErpGroupBuyer($erpGroupBuyer) : ProductDetails
    {
        $this->erpGroupBuyer = $erpGroupBuyer;
        return $this;
    }

    /**
     * @param string $erpGroupSupplier
     * @return ProductDetails
     */
    public function setErpGroupSupplier($erpGroupSupplier) : ProductDetails
    {
        $this->erpGroupSupplier = $erpGroupSupplier;
        return $this;
    }

    /**
     * @param float $deliveryTime
     * @return ProductDetails
     */
    public function setDeliveryTime($deliveryTime) : ProductDetails
    {
        $this->deliveryTime = $deliveryTime;
        return $this;
    }

    /**
     * @param string $remarks
     * @return ProductDetails
     */
    public function setRemarks($remarks) : ProductDetails
    {
        $this->remarks = $remarks;
        return $this;
    }

    /**
     * @param int $productOrder
     * @return ProductDetails
     */
    public function setProductOrder($productOrder) : ProductDetails
    {
        $this->productOrder = $productOrder;
        return $this;
    }

    /**
     * @param string $segment
     * @return ProductDetails
     */
    public function setSegment($segment) : ProductDetails
    {
        $this->segment = $segment;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionLong()
    {
        return $this->descriptionLong;
    }

    /**
     * @return string
     */
    public function getDescriptionShort()
    {
        return $this->descriptionShort;
    }

    /**
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @return string
     */
    public function getManufacturerName()
    {
        return $this->manufacturerName;
    }

    /**
     * @return string
     */
    public function getSegment()
    {
        return $this->segment;
    }

    /**
     * @return string
     */
    public function getSupplierAltPid()
    {
        return $this->supplierAltPid;
    }

    /**
     * @return BuyerPid[]
     */
    public function getBuyerPids()
    {
        if ($this->buyerPids === null) {
            return [];
        }

        return $this->buyerPids;
    }

    /**
     * @return string
     */
    public function getManufacturerPid()
    {
        return $this->manufacturerPid;
    }

    /**
     * @return string
     */
    public function getManufacturerTypeDescription()
    {
        return $this->manufacturerTypeDescription;
    }

    /**
     * @return string
     */
    public function getErpGroupBuyer()
    {
        return $this->erpGroupBuyer;
    }

    /**
     * @return string
     */
    public function getErpGroupSupplier()
    {
        return $this->erpGroupSupplier;
    }

    /**
     * @return float
     */
    public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }

    /**
     * @return SpecialTreatmentClassNode[]
     */
    public function getSpecialTreatmentClasses()
    {
        if ($this->specialTreatmentClasses === null) {
            return [];
        }

        return $this->specialTreatmentClasses;
    }

    /**
     * @return ProductKeyword[]
     */
    public function getKeywords()
    {
        if ($this->keywords === null) {
            return [];
        }

        return $this->keywords;
    }

    /**
     * @return string
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * @return int
     */
    public function getProductOrder()
    {
        return $this->productOrder;
    }

    /**
     * @return ProductStatusNode[]
     */
    public function getProductStatus()
    {
        if ($this->productStatus === null) {
            return [];
        }

        return $this->productStatus;
    }
}
