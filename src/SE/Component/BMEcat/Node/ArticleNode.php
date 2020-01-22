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
     * @Serializer\Type("array<SE\Component\BMEcat\Node\ArticleFeaturesNode>")
     * @Serializer\XmlList( inline=true, entry="ARTICLE_FEATURES")
     *
     * @var ArticleFeaturesNode[]
     */
    protected $features = [];

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("ARTICLE_ORDER_DETAILS")
     * @Serializer\Type("SE\Component\BMEcat\Node\ArticleOrderDetailsNode")
     *
     * @var ArticleOrderDetailsNode
     */
    protected $orderDetails;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("MIME_INFO")
     * @Serializer\Type("array<SE\Component\BMEcat\Node\ArticleMimeNode>")
     * @Serializer\XmlList( entry="MIME")
     *
     * @var ArticleMimeNode[]
     */
    protected $mimes = [];

    /**
     * Only for PIXI Import
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("ITEMTAGS")
     * @Serializer\Type("array<SE\Component\BMEcat\Node\ArticleItemTagNode>")
     * @Serializer\XmlList( entry="ITEMTAG")
     *
     * @var ArticleItemTagNode[]
     */
    protected $itemTags;

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
     * @param ArticleFeaturesNode $features
     */
    public function addFeatures(ArticleFeaturesNode $features)
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

    public function addMime(ArticleMimeNode $mime)
    {
        if ($this->mimes === null) {
            $this->mimes = [];
        }
        $this->mimes[] = $mime;
    }

    public function addItemTag(ArticleItemTagNode $itemTag) {
        if ($this->itemTags === null) {
            $this->itemTags = [];
        }
        $this->itemTags[] = $itemTag;
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
    public function nullItemTags()
    {
        if (empty($this->itemTags) === true) {
            $this->itemTags = null;
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
     * @return ArticleOrderDetailsNode|null
     */
    public function getOrderDetails()
    {
        return $this->orderDetails;
    }

    /**
     * @param ArticleOrderDetailsNode $orderDetails
     */
    public function setOrderDetails(ArticleOrderDetailsNode $orderDetails)
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
     * @return ArticleFeaturesNode[]
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
     * @return ArticleMimeNode[]|null
     */
    public function getMimes()
    {
        return $this->mimes;
    }

    /**
     * @param ArticleMimeNode[] $mimes
     */
    public function setMimes(array $mimes): void
    {
        $this->mimes = $mimes;
    }

    /**
     * @return ArticleItemTagNode[]|null
     */
    public function getItemTags()
    {
        return $this->itemTags;
    }

    /**
     * @param ArticleItemTagNode[] $itemTags
     */
    public function setItemTags(array $itemTags): void
    {
        $this->itemTags = $itemTags;
    }

}
