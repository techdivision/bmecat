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

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use SE\Component\BMEcat\Node\ProductFeaturesNode;
use SE\Component\BMEcat\Node\MimeNode;
use SE\Component\BMEcat\Node\ProductNode;
use SE\Component\BMEcat\Node\ProductOrderDetailsNode;
use SE\Component\BMEcat\Node\ProductPriceNode;
use SE\Component\BMEcat\Node\ProductDetailsNode;

/**
 *
 * @package SE\Component\BMEcat\Tests
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 */
class ProductNodeTest extends TestCase
{
    public function setUp() : void
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     *
     * @test
     */
    public function Set_Get_Id()
    {
        $node = new ProductNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getId());
        $node->setId($value);
        $this->assertEquals($value, $node->getId());
    }

    /**
     *
     * @test
     */
    public function Set_Get_Details()
    {
        $node = new ProductNode();
        $details = new ProductDetailsNode();

        $this->assertNull($node->getDetails());
        $node->setDetails($details);
        $this->assertEquals($details, $node->getDetails());
    }

    /**
     *
     * @test
     */
    public function Add_Get_Features()
    {

        $features = [
            new ProductFeaturesNode(),
            new ProductFeaturesNode(),
            new ProductFeaturesNode(),
        ];

        $node = new ProductNode();
        $this->assertEmpty($node->getFeatures());
        $node->nullFeatures();
        $this->assertEquals([], $node->getFeatures());

        foreach($features as $featureBlock) {
            $node->addFeatures($featureBlock);
        }

        $this->assertSame($features, $node->getFeatures());
    }

    /**
     *
     * @test
     */
    public function Add_Get_Prices()
    {
        $prices = [
            new ProductPriceNode(),
            new ProductPriceNode(),
            new ProductPriceNode(),
        ];

        $node = new ProductNode();
        $this->assertEmpty($node->getPrices());
        $node->nullPrices();
        $this->assertEquals([], $node->getPrices());

        foreach($prices as $price) {
            $node->addPrice($price);
        }

        $this->assertSame($prices, $node->getPrices());
    }

    /**
     *
     * @test
     */
    public function Add_Get_Product_Order_Details()
    {
        $node = new ProductNode();
        $value = new ProductOrderDetailsNode();

        $this->assertEmpty($node->getOrderDetails());
        $node->setOrderDetails($value);
        $this->assertSame($value, $node->getOrderDetails());
    }

    /**
     *
     * @test
     */
    public function Add_Get_Mime_Info()
    {
        $mimes = [
            new MimeNode(),
            new MimeNode(),
            new MimeNode(),
        ];

        $node = new ProductNode();
        $this->assertEmpty($node->getMimes());
        $node->nullMime();
        $this->assertEquals(null, $node->getMimes());

        foreach($mimes as $mime) {
            $node->addMime($mime);
        }

        $this->assertSame($mimes, $node->getMimes());
    }

    /**
     *
     * @test
     */
    public function Serialize_With_Null_Values()
    {
        $node = new ProductNode();
        $context = SerializationContext::create()->setSerializeNull(true);

        $expected = file_get_contents(__DIR__.'/../Fixtures/empty_product_with_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);
        $this->assertEquals($expected, $actual);
    }

    /**
     *
     * @test
     */
    public function Serialize_Without_Null_Values()
    {
        $node = new ProductNode();
        $context = SerializationContext::create()->setSerializeNull(false);

        $expected = file_get_contents(__DIR__.'/../Fixtures/empty_product_without_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }
} 
