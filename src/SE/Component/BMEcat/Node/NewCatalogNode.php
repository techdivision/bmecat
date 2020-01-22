<?php


namespace SE\Component\BMEcat\Node;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

use SE\Component\BMEcat\Exception\InvalidSetterException;
use SE\Component\BMEcat\Exception\UnknownKeyException;

/**
 *
 * @Serializer\XmlRoot("T_NEW_CATALOG")
 */
class NewCatalogNode extends AbstractNode
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("array<SE\Component\BMEcat\Node\ProductNode>")
     * @Serializer\XmlList(inline = true, entry = "PRODUCT")
     *
     * @var \SE\Component\BMEcat\Node\ProductNode[]
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
     * @param \SE\Component\BMEcat\Node\ProductNode $product
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
     * @return \SE\Component\BMEcat\Node\ProductNode[]
     */
    public function getProducts()
    {
        if ($this->products === null) {
            return [];
        }

        return $this->products;
    }
}
