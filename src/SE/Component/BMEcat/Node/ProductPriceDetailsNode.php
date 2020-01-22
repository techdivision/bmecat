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

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;
use SE\Component\BMEcat\Exception\InvalidSetterException;
use SE\Component\BMEcat\Exception\UnknownKeyException;

/**
 *
 * @package SE\Component\BMEcat
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 *
 * @Serializer\XmlRoot("PRODUCT_PRICE_DETAILS")
 */
class ProductPriceDetailsNode extends AbstractNode
{
    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("VALID_START_DATE")
     *
     * @var string
     */
    protected $validStartDate;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("VALID_END_DATE")
     *
     * @var string
     */
    protected $validEndDate;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("DAILY_PRICE")
     *
     * @var bool
     */
    protected $dailyPrice;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("PRODUCT_PRICE")
     * @Serializer\Type("array<SE\Component\BMEcat\Node\ProductPriceNode>")
     * @Serializer\XmlList(inline = true, entry = "PRODUCT_PRICE")
     *
     * @var ProductPriceNode[]
     */
    protected $prices = [];


    /**
     * @param string $validStartDate
     * @return ProductPriceDetailsNode
     */
    public function setValidStartDate(string $validStartDate): ProductPriceDetailsNode
    {
        $this->validStartDate = $validStartDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getValidStartDate(): string
    {
        return $this->validStartDate;
    }

    /**
     * @param string $validEndDate
     * @return ProductPriceDetailsNode
     */
    public function setValidEndDate(string $validEndDate): ProductPriceDetailsNode
    {
        $this->validEndDate = $validEndDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getValidEndDate(): string
    {
        return $this->validEndDate;
    }

    /**
     * @param bool $dailyPrice
     * @return ProductPriceDetailsNode
     */
    public function setDailyPrice(bool $dailyPrice): ProductPriceDetailsNode
    {
        $this->dailyPrice = $dailyPrice;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDailyPrice(): bool
    {
        return $this->dailyPrice;
    }

    /**
     * @param ProductPriceNode[] $prices
     * @return ProductPriceDetailsNode
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setPrices(array $prices): ProductPriceDetailsNode
    {
        $this->prices = [];
        foreach ($prices as $price) {
            if (is_array($price)) {
                $price = ProductPriceNode::fromArray($price);
            }
            $this->addPrice($price);
        }
        return $this;
    }

    public function addPrice(ProductPriceNode $price)
    {
        if ($this->prices === null) {
            $this->prices = [];
        }
        $this->prices[] = $price;
        return $this;
    }

    /**
     * @return ProductPriceNode[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }
}
