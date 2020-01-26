<?php


namespace Naugrim\BMEcat\Node;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("PRODUCT_DETAILS")
 */
class ProductDetailsNode extends AbstractNode
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
     * @Serializer\Type("array<Naugrim\BMEcat\Node\BuyerPidNode>")
     * @Serializer\XmlList(inline=true, entry="BUYER_PID")
     *
     * @var BuyerPidNode[]
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
     * @Serializer\Type("array<Naugrim\BMEcat\Node\SpecialTreatmentClassNode>")
     * @Serializer\XmlList(inline=true, entry="SPECIAL_TREATMENT_CLASS")
     *
     * @var SpecialTreatmentClassNode[]
     */
    protected $specialTreatmentClasses;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("array<Naugrim\BMEcat\Node\ProductKeywordNode>")
     * @Serializer\XmlList(inline=true, entry="KEYWORD")
     *
     * @var ProductKeywordNode[]
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
     * @Serializer\Type("array<Naugrim\BMEcat\Node\ProductStatusNode>")
     * @Serializer\XmlList(inline=true, entry="PRODUCT_STATUS")
     *
     * @var ProductStatusNode[]
     */
    protected $productStatus;

    /**
     * @param BuyerPidNode $buyerAid
     * @return ProductDetailsNode
     */
    public function addBuyerPid(BuyerPidNode $buyerAid) : ProductDetailsNode
    {
        if ($this->buyerPids === null) {
            $this->buyerPids = [];
        }
        $this->buyerPids[] = $buyerAid;
        return $this;
    }

    /**
     * @param SpecialTreatmentClassNode $specialTreatmentClass
     * @return ProductDetailsNode
     */
    public function addSpecialTreatmentClass(SpecialTreatmentClassNode $specialTreatmentClass) : ProductDetailsNode
    {
        if ($this->specialTreatmentClasses === null) {
            $this->specialTreatmentClasses = [];
        }
        $this->specialTreatmentClasses[] = $specialTreatmentClass;
        return $this;
    }

    /**
     * @param ProductKeywordNode $keyword
     * @return ProductDetailsNode
     */
    public function addKeyword(ProductKeywordNode $keyword) : ProductDetailsNode
    {
        if ($this->keywords === null) {
            $this->keywords = [];
        }
        $this->keywords[] = $keyword;
        return $this;
    }

    /**
     * @param ProductStatusNode $productStatus
     * @return ProductDetailsNode
     */
    public function addProductStatus(ProductStatusNode $productStatus) : ProductDetailsNode
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
     * @return ProductDetailsNode
     */
    public function nullBuyerPids() : ProductDetailsNode
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
     * @return ProductDetailsNode
     */
    public function nullSpecialTreatmentClasses() : ProductDetailsNode
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
     * @return ProductDetailsNode
     */
    public function nullKeywords() : ProductDetailsNode
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
     * @return ProductDetailsNode
     */
    public function nullProductStatus() : ProductDetailsNode
    {
        if (empty($this->productStatus) === true) {
            $this->productStatus = null;
        }
        return $this;
    }

    /**
     * @param string $descriptionShort
     * @return ProductDetailsNode
     */
    public function setDescriptionShort($descriptionShort) : ProductDetailsNode
    {
        $this->descriptionShort = $descriptionShort;
        return $this;
    }

    /**
     * @param string $descriptionLong
     * @return ProductDetailsNode
     */
    public function setDescriptionLong($descriptionLong) : ProductDetailsNode
    {
        $this->descriptionLong = $descriptionLong;
        return $this;
    }

    /**
     * @param string $ean
     * @return ProductDetailsNode
     */
    public function setEan($ean) : ProductDetailsNode
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     * @param string $supplierAltPid
     * @return ProductDetailsNode
     */
    public function setSupplierAltPid($supplierAltPid) : ProductDetailsNode
    {
        $this->supplierAltPid = $supplierAltPid;
        return $this;
    }

    /**
     * @param string $manufacturerPid
     * @return ProductDetailsNode
     */
    public function setManufacturerPid($manufacturerPid) : ProductDetailsNode
    {
        $this->manufacturerPid = $manufacturerPid;
        return $this;
    }

    /**
     * @param string $manufacturerName
     * @return ProductDetailsNode
     */
    public function setManufacturerName($manufacturerName) : ProductDetailsNode
    {
        $this->manufacturerName = $manufacturerName;
        return $this;
    }

    /**
     * @param string $manufacturerTypeDescription
     * @return ProductDetailsNode
     */
    public function setManufacturerTypeDescription($manufacturerTypeDescription) : ProductDetailsNode
    {
        $this->manufacturerTypeDescription = $manufacturerTypeDescription;
        return $this;
    }

    /**
     * @param string $erpGroupBuyer
     * @return ProductDetailsNode
     */
    public function setErpGroupBuyer($erpGroupBuyer) : ProductDetailsNode
    {
        $this->erpGroupBuyer = $erpGroupBuyer;
        return $this;
    }

    /**
     * @param string $erpGroupSupplier
     * @return ProductDetailsNode
     */
    public function setErpGroupSupplier($erpGroupSupplier) : ProductDetailsNode
    {
        $this->erpGroupSupplier = $erpGroupSupplier;
        return $this;
    }

    /**
     * @param float $deliveryTime
     * @return ProductDetailsNode
     */
    public function setDeliveryTime($deliveryTime) : ProductDetailsNode
    {
        $this->deliveryTime = $deliveryTime;
        return $this;
    }

    /**
     * @param string $remarks
     * @return ProductDetailsNode
     */
    public function setRemarks($remarks) : ProductDetailsNode
    {
        $this->remarks = $remarks;
        return $this;
    }

    /**
     * @param int $productOrder
     * @return ProductDetailsNode
     */
    public function setProductOrder($productOrder) : ProductDetailsNode
    {
        $this->productOrder = $productOrder;
        return $this;
    }

    /**
     * @param string $segment
     * @return ProductDetailsNode
     */
    public function setSegment($segment) : ProductDetailsNode
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
     * @return BuyerPidNode[]
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
     * @return ProductKeywordNode[]
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
