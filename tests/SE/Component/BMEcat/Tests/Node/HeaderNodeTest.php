<?php


namespace SE\Component\BMEcat\Tests\Node;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use SE\Component\BMEcat\Node\CatalogNode;
use SE\Component\BMEcat\Node\HeaderNode;
use SE\Component\BMEcat\Node\SupplierNode;

/**
 *
 * @package SE\Component\BMEcat\Tests
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 */
class HeaderNodeTest extends TestCase
{
    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    private $serializer;

    public function setUp() : void
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     *
     * @test
     */
    public function Set_Get_Generator_Info()
    {
        $node = new HeaderNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getGeneratorInfo());
        $node->setGeneratorInfo($value);
        $this->assertEquals($value, $node->getGeneratorInfo());
    }

    /**
     *
     * @test
     */
    public function Set_Get_Supplier()
    {
        $header = new HeaderNode();
        $supplier = new SupplierNode();

        $this->assertNull($header->getSupplier());
        $header->setSupplier($supplier);
        $this->assertEquals($supplier, $header->getSupplier());
    }

    /**
     *
     * @test
     */
    public function Set_Get_Catalog()
    {
        $header = new HeaderNode();
        $catalog = new CatalogNode();

        $this->assertNull($header->getCatalog());
        $header->setCatalog($catalog);
        $this->assertEquals($catalog, $header->getCatalog());
    }

    /**
     *
     * @test
     */
    public function Serialize_With_Null_Values()
    {
        $node = new HeaderNode();
        $context = SerializationContext::create()->setSerializeNull(true);

        $expected = file_get_contents(__DIR__.'/../Fixtures/empty_header_with_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }

    /**
     *
     * @test
     */
    public function Serialize_Without_Null_Values()
    {
        $node = new HeaderNode();
        $context = SerializationContext::create()->setSerializeNull(false);

        $expected = file_get_contents(__DIR__.'/../Fixtures/empty_header_without_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }
}
