<?php


namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;

/**
 *
 * @Serializer\XmlRoot("PRODUCT_PRICE_DETAILS")
 */
class ProductPriceDetails implements Contracts\NodeInterface
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
     * @Serializer\Type("array<Naugrim\BMEcat\Nodes\ProductPriceNode>")
     * @Serializer\XmlList(inline = true, entry = "PRODUCT_PRICE")
     *
     * @var ProductPriceNode[]
     */
    protected $prices = [];


    /**
     * @param string $validStartDate
     * @return ProductPriceDetails
     */
    public function setValidStartDate(string $validStartDate): ProductPriceDetails
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
     * @return ProductPriceDetails
     */
    public function setValidEndDate(string $validEndDate): ProductPriceDetails
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
     * @return ProductPriceDetails
     */
    public function setDailyPrice(bool $dailyPrice): ProductPriceDetails
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
     * @return ProductPriceDetails
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setPrices(array $prices): ProductPriceDetails
    {
        $this->prices = [];
        foreach ($prices as $price) {
            if (is_array($price)) {
                $price = NodeBuilder::fromArray($price, new ProductPriceNode());
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
