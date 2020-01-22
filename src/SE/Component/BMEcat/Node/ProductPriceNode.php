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

use SE\Component\BMEcat\Node\AbstractNode;

/**
 *
 * @package SE\Component\BMEcat
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 *
 * @Serializer\XmlRoot("PRODUCT_PRICE")
 */
class ProductPriceNode extends AbstractNode
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
    protected $currency;

    /**
     *
     * @param string $currency
     * @return ProductPriceNode
     */
    public function setCurrency($currency) : ProductPriceNode
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
     * @return ProductPriceNode
     */
    public function setPrice($price) : ProductPriceNode
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
}