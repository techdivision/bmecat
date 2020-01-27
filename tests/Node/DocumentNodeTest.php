<?php


namespace Naugrim\BMEcat\Tests\Node;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use Naugrim\BMEcat\Nodes\DocumentNode;
use Naugrim\BMEcat\Nodes\HeaderNode;
use Naugrim\BMEcat\Nodes\NewCatalogNode;


class DocumentNodeTest extends TestCase
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
    public function Set_Get_Version()
    {
        $document = new DocumentNode();

        $this->assertEquals('2005.1', $document->getVersion());
        $document->setVersion('1.9');
        $this->assertEquals('1.9', $document->getVersion());
    }

    /**
     *
     * @test
     */
    public function Set_Get_New_Catalog()
    {
        $document = new DocumentNode();
        $catalog = new NewCatalogNode();

        $this->assertNull($document->getNewCatalog());
        $document->setNewCatalog($catalog);
        $this->assertSame($catalog, $document->getNewCatalog());
    }

    /**
     *
     * @test
     */
    public function Set_Get_New_Header()
    {
        $document = new DocumentNode();
        $header = new HeaderNode();

        $this->assertNull($document->getHeader());
        $document->setHeader($header);
        $this->assertSame($header, $document->getHeader());
    }

    /**
     *
     * @test
     */
    public function Serialize_With_Null_Values()
    {
        $node = new DocumentNode();
        $context = SerializationContext::create()->setSerializeNull(true);

        $expected = file_get_contents(__DIR__ . '/../Fixtures/empty_document_nochildren_with_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }

    /**
     *
     * @test
     */
    public function Serialize_Without_Null_Values()
    {
        $node = new DocumentNode();
        $context = SerializationContext::create()->setSerializeNull(false);

        $expected = file_get_contents(__DIR__ . '/../Fixtures/empty_document_nochildren_without_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }
}
