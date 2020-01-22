<?php


namespace Naugrim\BMEcat\Tests;

use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use SE\Component\BMEcat\DocumentBuilder;
use SE\Component\BMEcat\Exception\MissingDocumentException;
use SE\Component\BMEcat\Node\DocumentNode;


class DocumentBuilderTest extends TestCase
{
    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    private $serializer;

    public function setUp() : void
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function testCanBeInstantiated()
    {
        $builder = new DocumentBuilder($this->serializer);
        $this->assertInstanceOf(DocumentBuilder::class, $builder);
    }

    public function testSetsUpDefaultDependencies()
    {
        $builder = new DocumentBuilder();
        $this->assertInstanceOf('\JMS\Serializer\Serializer', $builder->getSerializer());
    }

    /**
     *
     * @test
     */
    public function Instantiate_Via_Static_Method()
    {
        $builder = DocumentBuilder::create($this->serializer);
        $this->assertInstanceOf('\JMS\Serializer\Serializer', $builder->getSerializer());
    }

    /**
     *
     * @test
     */
    public function To_String_Returns_Default_Document_Without_Null_Values()
    {
        $builder = new DocumentBuilder;
        $document = DocumentNode::fromArray([]);
        $builder->setDocument($document);

        $expected = file_get_contents(__DIR__ . '/Fixtures/empty_document_without_null_values.xml');
        $this->assertEquals($expected, $builder->toString());
    }

    /**
     *
     * @test
     */
    public function To_String_Throws_Exception()
    {
        $this->expectException(MissingDocumentException::class);
        $builder = new DocumentBuilder;
        $builder->toString();
    }
}
