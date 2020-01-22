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
use SE\Component\BMEcat\Node\ProductNode;

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
     * @param \SE\Component\BMEcat\Node\ProductNode $product
     * @return NewCatalogNode
     */
    public function addProduct(ProductNode $product) : NewCatalogNode
    {
        if($this->products === null) {
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
        if(empty($this->products ) === true) {
            $this->products = null;
        }
    }

    /**
     *
     * @return \SE\Component\BMEcat\Node\ProductNode[]
     */
    public function getProducts()
    {
        if($this->products === null)  {
            return [];
        }

        return $this->products;
    }


}