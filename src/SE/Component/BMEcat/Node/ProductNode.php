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
 * @Serializer\XmlRoot("PRODUCT")
 */
class ProductNode extends AbstractNode
{
    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SUPPLIER_PID")
     *
     * @var string
     */
    protected $id;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("PRODUCT_DETAILS")
     * @Serializer\Type("SE\Component\BMEcat\Node\ProductDetailsNode")
     *
     * @var ProductDetailsNode
     */
    protected $detail;


    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("array<SE\Component\BMEcat\Node\ProductFeaturesNode>")
     * @Serializer\XmlList( inline=true, entry="PRODUCT_FEATURES")
     *
     * @var ProductFeaturesNode[]
     */
    protected $features = [];

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("PRODUCT_ORDER_DETAILS")
     * @Serializer\Type("SE\Component\BMEcat\Node\ProductOrderDetailsNode")
     *
     * @var ProductOrderDetailsNode
     */
    protected $orderDetails;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("PRODUCT_PRICE_DETAILS")
     * @Serializer\Type("array<SE\Component\BMEcat\Node\ProductPriceNode>")
     * @Serializer\XmlList( entry="PRODUCT_PRICE")
     *
     * @var ProductPriceNode[]
     */
    protected $prices = [];

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("MIME_INFO")
     * @Serializer\Type("array<SE\Component\BMEcat\Node\MimeNode>")
     * @Serializer\XmlList( entry="MIME")
     *
     * @var MimeNode[]
     */
    protected $mimes = [];

    /**
     *
     * @param ProductDetailsNode $detail
     * @return ProductNode
     */
    public function setDetails(ProductDetailsNode $detail) : ProductNode
    {
        $this->detail = $detail;
        return $this;
    }

    /**
     *
     * @return ProductDetailsNode
     */
    public function getDetails()
    {
        return $this->detail;
    }

    /**
     *
     * @param ProductFeaturesNode $features
     * @return ProductNode
     */
    public function addFeatures(ProductFeaturesNode $features) : ProductNode
    {
        if ($this->features === null) {
            $this->features = [];
        }
        $this->features [] = $features;
        return $this;
    }
    /**
     *
     * @param ProductPriceNode $price
     * @return ProductNode
     */
    public function addPrice(ProductPriceNode $price) : ProductNode
    {
        if ($this->prices === null) {
            $this->prices = [];
        }
        $this->prices[] = $price;
        return $this;
    }

    /**
     * @param MimeNode $mime
     * @return ProductNode
     */
    public function addMime(MimeNode $mime) : ProductNode
    {
        if ($this->mimes === null) {
            $this->mimes = [];
        }
        $this->mimes[] = $mime;
        return $this;
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     * @return ProductNode
     */
    public function nullFeatures() : ProductNode
    {
        if (empty($this->features) === true) {
            $this->features = null;
        }

        return $this;
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     * @return ProductNode
     */
    public function nullPrices() : ProductNode
    {
        if (empty($this->prices) === true) {
            $this->prices = null;
        }
        return $this;
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     * @return ProductNode
     */
    public function nullMime() : ProductNode
    {
        if (empty($this->mimes) === true) {
            $this->mimes = null;
        }
        return $this;
    }

    /**
     *
     * @param string $id
     * @return ProductNode
     */
    public function setId($id) : ProductNode
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param ProductDetailsNode $detail
     * @return ProductNode
     */
    public function setDetail(ProductDetailsNode $detail) : ProductNode
    {
        $this->detail = $detail;
        return $this;
    }

    /**
     * @return ProductOrderDetailsNode|null
     */
    public function getOrderDetails()
    {
        return $this->orderDetails;
    }

    /**
     * @param ProductOrderDetailsNode $orderDetails
     * @return ProductNode
     */
    public function setOrderDetails(ProductOrderDetailsNode $orderDetails) : ProductNode
    {
        $this->orderDetails = $orderDetails;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ProductDetailsNode
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     *
     * @return ProductFeaturesNode[]
     */
    public function getFeatures()
    {
        if ($this->features === null) {
            return [];
        }

        return $this->features;
    }

    /**
     *
     * @return ProductPriceNode[]
     */
    public function getPrices()
    {
        if ($this->prices === null) {
            return [];
        }

        return $this->prices;
    }

    /**
     * @return MimeNode[]|null
     */
    public function getMimes()
    {
        return $this->mimes;
    }

    /**
     * @param MimeNode[] $mimes
     * @return ProductNode
     */
    public function setMimes(array $mimes): ProductNode
    {
        $this->mimes = $mimes;
        return $this;
    }
}
