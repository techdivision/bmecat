<?php


namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;

/**
 *
 * @Serializer\XmlRoot("T_NEW_CATALOG")
 */
class NewCatalogNode extends AbstractNode
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("array<Naugrim\BMEcat\Nodes\ProductNode>")
     * @Serializer\XmlList(inline = true, entry = "PRODUCT")
     *
     * @var \Naugrim\BMEcat\Nodes\ProductNode[]
     */
    protected $products = [];

    /**
     *
     * @param ProductNode[] $products
     * @return NewCatalogNode
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setProducts(array $products) : NewCatalogNode
    {
        $this->products = [];

        foreach ($products as $product) {
            if (is_array($product)) {
                $product = ProductNode::fromArray($product);
            }
            $this->addProduct($product);
        }
        return $this;
    }

    /**
     *
     * @param \Naugrim\BMEcat\Nodes\ProductNode $product
     * @return NewCatalogNode
     */
    public function addProduct(ProductNode $product) : NewCatalogNode
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
     * @return \Naugrim\BMEcat\Nodes\ProductNode[]
     */
    public function getProducts()
    {
        if ($this->products === null) {
            return [];
        }

        return $this->products;
    }
}
