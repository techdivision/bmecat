<?php


namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;

/**
 *
 * @Serializer\XmlRoot("T_NEW_CATALOG")
 */
class NewCatalogNode implements Contracts\NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("array<Naugrim\BMEcat\Nodes\Product>")
     * @Serializer\XmlList(inline = true, entry = "PRODUCT")
     *
     * @var Product[]
     */
    protected $products = [];

    /**
     *
     * @param Product[] $products
     * @return NewCatalogNode
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setProducts(array $products) : NewCatalogNode
    {
        $this->products = [];

        foreach ($products as $product) {
            if (is_array($product)) {
                $product = NodeBuilder::fromArray($product, new Product());
            }
            $this->addProduct($product);
        }
        return $this;
    }

    /**
     *
     * @param Product $product
     * @return NewCatalogNode
     */
    public function addProduct(Product $product) : NewCatalogNode
    {
        if ($this->products === null) {
            $this->products = [];
        }
        $this->products []= $product;
        return $this;
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     */
    public function nullProducts()
    {
        if (empty($this->products) === true) {
            $this->products = null;
        }
    }

    /**
     *
     * @return Product[]
     */
    public function getProducts()
    {
        if ($this->products === null) {
            return [];
        }

        return $this->products;
    }
}
