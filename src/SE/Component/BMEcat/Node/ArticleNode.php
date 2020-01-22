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
 * @Serializer\XmlRoot("ARTICLE")
 */
class ArticleNode extends AbstractNode
{
    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SUPPLIER_AID")
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
     * @Serializer\SerializedName("ARTICLE_PRICE_DETAILS")
     * @Serializer\Type("array<SE\Component\BMEcat\Node\ArticlePriceNode>")
     * @Serializer\XmlList( entry="ARTICLE_PRICE")
     *
     * @var ArticlePriceNode[]
     */
    protected $prices = [];

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
     */
    public function setDetails(ProductDetailsNode $detail)
    {
        $this->detail = $detail;
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
     */
    public function addFeatures(ProductFeaturesNode $features)
    {
        if ($this->features === null) {
            $this->features = [];
        }
        $this->features [] = $features;
    }
    /**
     *
     * @param ArticlePriceNode $price
     */
    public function addPrice(ArticlePriceNode $price)
    {
        if ($this->prices === null) {
            $this->prices = [];
        }
        $this->prices[] = $price;
    }

    public function addMime(MimeNode $mime)
    {
        if ($this->mimes === null) {
            $this->mimes = [];
        }
        $this->mimes[] = $mime;
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     */
    public function nullFeatures()
    {
        if (empty($this->features) === true) {
            $this->features = null;
        }
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     */
    public function nullPrices()
    {
        if (empty($this->prices) === true) {
            $this->prices = null;
        }
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     */
    public function nullMime()
    {
        if (empty($this->mimes) === true) {
            $this->mimes = null;
        }
    }

    /**
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param ProductDetailsNode $detail
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
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
     */
    public function setOrderDetails(ProductOrderDetailsNode $orderDetails)
    {
        $this->orderDetails = $orderDetails;
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
     * @return ArticlePriceNode[]
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
     */
    public function setMimes(array $mimes): void
    {
        $this->mimes = $mimes;
    }
}
