<?php
/**
 * This file is part of the BMEcat php library
 *
 * (c) Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SE\Component\BMEcat\Tests\Node;

/**
 *
 * @package SE\Component\BMEcat\Tests
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 */
class NewCatalogNodeTest  extends \PHPUnit\Framework\TestCase
{
    public function setUp() : void
    {
        $this->serializer = \JMS\Serializer\SerializerBuilder::create()->build();
    }

    /**
     *
     * @test
     */
    public function Add_Get_Product_Node()
    {
        $products = [
            new \SE\Component\BMEcat\Node\ProductNode(),
            new \SE\Component\BMEcat\Node\ProductNode(),
            new \SE\Component\BMEcat\Node\ProductNode(),
        ];

        $node = new \SE\Component\BMEcat\Node\NewCatalogNode();
        $this->assertEmpty($node->getProducts());
        $node->nullProducts();
        $this->assertEquals([], $node->getProducts());

        foreach($products as $product) {
            $node->addProduct($product);
        }

        $this->assertSame($products, $node->getProducts());
    }

    /**
     *
     * @test
     */
    public function Serialize_With_Null_Values()
    {
        $node = new \SE\Component\BMEcat\Node\NewCatalogNode();
        $context = \JMS\Serializer\SerializationContext::create()->setSerializeNull(true);

        $expected = file_get_contents(__DIR__.'/../Fixtures/empty_new_catalog_with_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }

    /**
     *
     * @test
     */
    public function Serialize_Without_Null_Values()
    {
        $node = new \SE\Component\BMEcat\Node\NewCatalogNode();
        $context = \JMS\Serializer\SerializationContext::create()->setSerializeNull(false);

        $expected = file_get_contents(__DIR__.'/../Fixtures/empty_new_catalog_without_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }
} 