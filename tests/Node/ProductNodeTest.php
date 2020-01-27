<?php


namespace Naugrim\BMEcat\Tests\Node;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Naugrim\BMEcat\DocumentBuilder;
use Naugrim\BMEcat\Nodes\SupplierPid;
use PHPUnit\Framework\TestCase;
use Naugrim\BMEcat\Nodes\ProductFeatures;
use Naugrim\BMEcat\Nodes\Mime;
use Naugrim\BMEcat\Nodes\Product;
use Naugrim\BMEcat\Nodes\ProductOrderDetailsNode;
use Naugrim\BMEcat\Nodes\ProductPriceDetailsNode;
use Naugrim\BMEcat\Nodes\ProductPriceNode;
use Naugrim\BMEcat\Nodes\ProductDetails;


class ProductNodeTest extends TestCase
{
    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    private $serializer;

    public function setUp() : void
    {
        $this->serializer = (new DocumentBuilder())->getSerializer();
    }

    /**
     *
     * @test
     */
    public function Set_Get_Id()
    {
        $node = new Product();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getId());
        $supplierPid = new SupplierPid();
        $supplierPid->setValue($value);
        $node->setId($supplierPid);

        $this->assertEquals($value, $node->getId()->getValue());
    }

    /**
     *
     * @test
     */
    public function Set_Get_Details()
    {
        $node = new Product();
        $details = new ProductDetails();

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
            new ProductFeatures(),
            new ProductFeatures(),
            new ProductFeatures(),
        ];

        $node = new Product();
        $this->assertEmpty($node->getFeatures());
        $node->nullFeatures();
        $this->assertEquals([], $node->getFeatures());

        foreach ($features as $featureBlock) {
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
        $priceDetails = [
            (new ProductPriceDetailsNode)->addPrice(new ProductPriceNode()),
            (new ProductPriceDetailsNode)->addPrice(new ProductPriceNode()),
            (new ProductPriceDetailsNode)->addPrice(new ProductPriceNode()),
        ];

        $node = new Product();
        $this->assertEmpty($node->getPriceDetails());
        $node->nullPriceDetails();
        $this->assertEquals([], $node->getPriceDetails());

        foreach ($priceDetails as $priceDetail) {
            $node->addPriceDetail($priceDetail);
        }

        $this->assertSame($priceDetails, $node->getPriceDetails());
    }

    /**
     *
     * @test
     */
    public function Add_Get_Product_Order_Details()
    {
        $node = new Product();
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
            new Mime(),
            new Mime(),
            new Mime(),
        ];

        $node = new Product();
        $this->assertEmpty($node->getMimes());
        $node->nullMime();
        $this->assertEquals(null, $node->getMimes());

        foreach ($mimes as $mime) {
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
        $node = new Product();
        $context = SerializationContext::create()->setSerializeNull(true);

        $expected = file_get_contents(__DIR__ . '/../Fixtures/empty_product_with_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);
        $this->assertEquals($expected, $actual);
    }

    /**
     *
     * @test
     */
    public function Serialize_Without_Null_Values()
    {
        $node = new Product();
        $context = SerializationContext::create()->setSerializeNull(false);

        $expected = file_get_contents(__DIR__ . '/../Fixtures/empty_product_without_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }
}
