<?php
/**
 * This file is part of the BMEcat php library
 *
 * (c) Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SE\Component\BMEcat\Node;

use JMS\Serializer\Annotation as Serializer;

/**
 *
 * @package SE\Component\BMEcat
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
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
     * @Serializer\Type("array<SE\Component\BMEcat\Node\BuyerPidNode>")
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
     * @Serializer\Type("array<SE\Component\BMEcat\Node\SpecialTreatmentClassNode>")
     * @Serializer\XmlList(inline=true, entry="SPECIAL_TREATMENT_CLASS")
     *
     * @var SpecialTreatmentClassNode[]
     */
    protected $specialTreatmentClasses;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("array<SE\Component\BMEcat\Node\ProductKeywordNode>")
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
     * @Serializer\Type("array<SE\Component\BMEcat\Node\ProductStatusNode>")
     * @Serializer\XmlList(inline=true, entry="PRODUCT_STATUS")
     *
     * @var ProductStatusNode[]
     */
    protected $productStatus;

    /**
     * @param BuyerPidNode $buyerAid
     */
    public function addBuyerPid(BuyerPidNode $buyerAid)
    {
        if ($this->buyerPids === null) {
            $this->buyerPids = [];
        }
        $this->buyerPids[] = $buyerAid;
    }

    /**
     * @param SpecialTreatmentClassNode $specialTreatmentClass
     */
    public function addSpecialTreatmentClass(SpecialTreatmentClassNode $specialTreatmentClass)
    {
        if ($this->specialTreatmentClasses === null) {
            $this->specialTreatmentClasses = [];
        }
        $this->specialTreatmentClasses[] = $specialTreatmentClass;
    }

    /**
     * @param ProductKeywordNode $keyword
     */
    public function addKeyword(ProductKeywordNode $keyword)
    {
        if ($this->keywords === null) {
            $this->keywords = [];
        }
        $this->keywords[] = $keyword;
    }

    /**
     * @param ProductStatusNode $productStatus
     */
    public function addProductStatus(ProductStatusNode $productStatus)
    {
        if ($this->productStatus === null) {
            $this->productStatus = [];
        }
        $this->productStatus[] = $productStatus;
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     */
    public function nullBuyerPids()
    {
        if (empty($this->buyerPids) === true) {
            $this->buyerPids = null;
        }
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     */
    public function nullSpecialTreatmentClasses()
    {
        if (empty($this->specialTreatmentClasses) === true) {
            $this->specialTreatmentClasses = null;
        }
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     */
    public function nullKeywords()
    {
        if (empty($this->keywords) === true) {
            $this->keywords = null;
        }
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     */
    public function nullProductStatus()
    {
        if (empty($this->productStatus) === true) {
            $this->productStatus = null;
        }
    }

    /**
     * @param string $descriptionShort
     */
    public function setDescriptionShort($descriptionShort)
    {
        $this->descriptionShort = $descriptionShort;
    }

    /**
     * @param string $descriptionLong
     */
    public function setDescriptionLong($descriptionLong)
    {
        $this->descriptionLong = $descriptionLong;
    }

    /**
     * @param string $ean
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
    }

    /**
     * @param string $supplierAltPid
     */
    public function setSupplierAltPid($supplierAltPid)
    {
        $this->supplierAltPid = $supplierAltPid;
    }

    /**
     * @param string $manufacturerPid
     */
    public function setManufacturerPid($manufacturerPid)
    {
        $this->manufacturerPid = $manufacturerPid;
    }

    /**
     * @param string $manufacturerName
     */
    public function setManufacturerName($manufacturerName)
    {
        $this->manufacturerName = $manufacturerName;
    }

    /**
     * @param string $manufacturerTypeDescription
     */
    public function setManufacturerTypeDescription($manufacturerTypeDescription)
    {
        $this->manufacturerTypeDescription = $manufacturerTypeDescription;
    }

    /**
     * @param string $erpGroupBuyer
     */
    public function setErpGroupBuyer($erpGroupBuyer)
    {
        $this->erpGroupBuyer = $erpGroupBuyer;
    }

    /**
     * @param string $erpGroupSupplier
     */
    public function setErpGroupSupplier($erpGroupSupplier)
    {
        $this->erpGroupSupplier = $erpGroupSupplier;
    }

    /**
     * @param float $deliveryTime
     */
    public function setDeliveryTime($deliveryTime)
    {
        $this->deliveryTime = $deliveryTime;
    }

    /**
     * @param string $remarks
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;
    }

    /**
     * @param int $productOrder
     */
    public function setProductOrder($productOrder)
    {
        $this->productOrder = $productOrder;
    }

    /**
     * @param string $segment
     */
    public function setSegment($segment)
    {
        $this->segment = $segment;
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
