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
use SE\Component\BMEcat\Node\ProductKeywordNode;
use SE\Component\BMEcat\Node\ProductStatusNode;
use SE\Component\BMEcat\Node\BuyerPidNode;
use SE\Component\BMEcat\Node\ProductDetailsNode;
use SE\Component\BMEcat\Node\SpecialTreatmentClassNode;

/**
 *
 * @package SE\Component\BMEcat\Tests
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 */
class ProductDetailsNodeTest extends TestCase
{
    private $serializer;
    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    private $serializer;
    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    private $serializer;

    public function setUp() : void
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * @test
     */
    public function Add_Get_Buyer_Pides()
    {
        $buyerPids = [
            new BuyerPidNode(),
            new BuyerPidNode(),
            new BuyerPidNode(),
        ];

        $node = new ProductDetailsNode();
        $this->assertEmpty($node->getBuyerPids());
        $node->nullBuyerPids();
        $this->assertEquals([], $node->getBuyerPids());

        foreach ($buyerPids as $buyerPid) {
            $node->addBuyerPid($buyerPid);
        }

        $this->assertEquals($buyerPids, $node->getBuyerPids());
    }

    /**
     * @test
     */
    public function Add_Get_Special_Treatment_Classes()
    {
        $specialTreatmentClasses = [
            new SpecialTreatmentClassNode(),
            new SpecialTreatmentClassNode(),
            new SpecialTreatmentClassNode(),
        ];

        $node = new ProductDetailsNode();
        $this->assertEmpty($node->getSpecialTreatmentClasses());
        $node->nullSpecialTreatmentClasses();
        $this->assertEquals([], $node->getSpecialTreatmentClasses());

        foreach ($specialTreatmentClasses as $specialTreatmentClass) {
            $node->addSpecialTreatmentClass($specialTreatmentClass);
        }

        $this->assertEquals($specialTreatmentClasses, $node->getSpecialTreatmentClasses());
    }

    /**
     * @test
     */
    public function Add_Get_Keywords()
    {
        $keywords = [
            new ProductKeywordNode(),
            new ProductKeywordNode(),
            new ProductKeywordNode(),
        ];

        $node = new ProductDetailsNode();
        $this->assertEmpty($node->getKeywords());
        $node->nullKeywords();
        $this->assertEquals([], $node->getKeywords());

        foreach ($keywords as $keyword) {
            $node->addKeyword($keyword);
        }

        $this->assertEquals($keywords, $node->getKeywords());
    }

    /**
     * @test
     */
    public function Add_Get_Product_Status()
    {
        $productStatus = [
            new ProductStatusNode(),
            new ProductStatusNode(),
            new ProductStatusNode(),
        ];

        $node = new ProductDetailsNode();
        $this->assertEmpty($node->getProductStatus());
        $node->nullProductStatus();
        $this->assertEquals([], $node->getProductStatus());

        foreach ($productStatus as $singleProductStatus) {
            $node->addProductStatus($singleProductStatus);
        }

        $this->assertEquals($productStatus, $node->getProductStatus());
    }

    /**
     * @test
     */
    public function Set_Get_Description_Long()
    {
        $node = new ProductDetailsNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getDescriptionLong());
        $node->setDescriptionLong($value);
        $this->assertEquals($value, $node->getDescriptionLong());
    }

    /**
     * @test
     */
    public function Set_Get_Description_Short()
    {
        $node = new ProductDetailsNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertEquals('', $node->getDescriptionShort());
        $node->setDescriptionShort($value);
        $this->assertEquals($value, $node->getDescriptionShort());
    }

    /**
     * @test
     */
    public function Set_Get_Ean()
    {
        $node = new ProductDetailsNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getEan());
        $node->setEan($value);
        $this->assertEquals($value, $node->getEan());
    }

    /**
     * @test
     */
    public function Set_Get_Supplier_Alt_Pid()
    {
        $node = new ProductDetailsNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getSupplierAltPid());
        $node->setSupplierAltPid($value);
        $this->assertEquals($value, $node->getSupplierAltPid());
    }

    /**
     * @test
     */
    public function Set_Get_Manufacturer_Name()
    {
        $node = new ProductDetailsNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getManufacturerName());
        $node->setManufacturerName($value);
        $this->assertEquals($value, $node->getManufacturerName());
    }

    /**
     * @test
     */
    public function Set_Get_Manufacturer_Type_Description()
    {
        $node = new ProductDetailsNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getManufacturerTypeDescription());
        $node->setManufacturerTypeDescription($value);
        $this->assertEquals($value, $node->getManufacturerTypeDescription());
    }

    /**
     * @test
     */
    public function Set_Get_Erp_Group_Buyer()
    {
        $node = new ProductDetailsNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getErpGroupBuyer());
        $node->setErpGroupBuyer($value);
        $this->assertEquals($value, $node->getErpGroupBuyer());
    }

    /**
     * @test
     */
    public function Set_Get_Erp_Group_Supplier()
    {
        $node = new ProductDetailsNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getErpGroupSupplier());
        $node->setErpGroupSupplier($value);
        $this->assertEquals($value, $node->getErpGroupSupplier());
    }

    /**
     * @test
     */
    public function Set_Get_Delivery_Time()
    {
        $node = new ProductDetailsNode();
        $value = rand(10, 1000);

        $this->assertNull($node->getDeliveryTime());
        $node->setDeliveryTime($value);
        $this->assertEquals($value, $node->getDeliveryTime());
    }

    /**
     * @test
     */
    public function Set_Get_Remarks()
    {
        $node = new ProductDetailsNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getRemarks());
        $node->setRemarks($value);
        $this->assertEquals($value, $node->getRemarks());
    }

    /**
     * @test
     */
    public function Set_Get_Product_Order()
    {
        $node = new ProductDetailsNode();
        $value = rand(10, 1000);

        $this->assertNull($node->getProductOrder());
        $node->setProductOrder($value);
        $this->assertEquals($value, $node->getProductOrder());
    }

    /**
     * @test
     */
    public function Set_Get_Description_Segment()
    {
        $node = new ProductDetailsNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getSegment());
        $node->setSegment($value);
        $this->assertEquals($value, $node->getSegment());
    }

    /**
     * @test
     */
    public function Serialize_With_Null_Values()
    {
        $node = new ProductDetailsNode();
        $context = SerializationContext::create()->setSerializeNull(true);

        $expected = file_get_contents(__DIR__ . '/../Fixtures/empty_product_details_with_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function Serialize_Without_Null_Values()
    {
        $node = new ProductDetailsNode();
        $context = SerializationContext::create()->setSerializeNull(false);

        $expected = file_get_contents(__DIR__ . '/../Fixtures/empty_product_details_without_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }
}
