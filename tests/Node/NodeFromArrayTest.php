<?php

namespace Naugrim\BMEcat\Tests\Node;

use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Catalog;
use Naugrim\BMEcat\Nodes\Document;
use Naugrim\BMEcat\Nodes\NewCatalog;
use Naugrim\BMEcat\Tests\Fixtures\Node\Node;
use PHPUnit\Framework\TestCase;
use TypeError;


class NodeFromArrayTest extends TestCase
{

    /**
     * @var
     */
    protected $minimalValidDocument;

    protected function setUp(): void
    {
        parent::setUp();

        $this->minimalValidDocument = file_get_contents(__DIR__ . '/../Fixtures/2005.1/minimal_valid_document.xml');

    }

    public function testEmptyArray()
    {
        $document = NodeBuilder::fromArray([], new Document());
        $this->assertInstanceOf(Document::class, $document);
    }

    public function testInvalidSetter()
    {
        $this->expectException(UnknownKeyException::class);
        NodeBuilder::fromArray(['thereisnosetterforthis' => 1], new Document());
    }

    public function testScalarValue()
    {
        $document = NodeBuilder::fromArray(['version' => "1234567"], new Document());
        $this->assertEquals("1234567", $document->getVersion());
    }

    public function testObjectValue()
    {
        $catalog = new NewCatalog();
        $document = NodeBuilder::fromArray([
            'newCatalog' => $catalog
        ], new Document());
        $this->assertSame($catalog, $document->getNewCatalog());
    }

    public function testInvalidSetterNoArguments()
    {
        $this->expectException(InvalidSetterException::class);
        NodeBuilder::fromArray([
            'noArguments' => []
        ], new Node());
    }

    public function testInvalidSetterNoTypeHint()
    {
        $this->expectException(InvalidSetterException::class);
        NodeBuilder::fromArray([
            'noTypeHint' => []
        ], new Node());
    }

    public function testInvalidSetterScalarTypeHint()
    {
        $this->expectException(TypeError::class);
        NodeBuilder::fromArray([
            'scalarTypeHint' => []
        ], new Node());
    }

    public function testSetterMatchingTypeHintFloat()
    {
        $float = 1.23456;
        $node = NodeBuilder::fromArray([
            'matchingTypeHintFloat' => $float
        ], new Node());
        $this->assertEquals($float, $node->someFloat);
    }

    public function testSetterMatchingTypeHintArray()
    {
        $array = [];
        $node = NodeBuilder::fromArray([
            'matchingTypeHintArray' => $array
        ], new Node());
        $this->assertSame($array, $node->someArray);
    }

    public function testSetterMatchingTypeHintNode()
    {
        $anotherNode = new Node();
        $node = NodeBuilder::fromArray([
            'matchingTypeHintNode' => $anotherNode
        ], new Node());
        $this->assertSame($anotherNode, $node->anotherNode);
    }

    public function testRecursiveFromArrayWithArrays()
    {
        $array = [
            'test' => '123'
        ];

        $node = NodeBuilder::fromArray([
            'matchingTypeHintNode' => [
                'matchingTypeHintArray' => $array
            ]
        ], new Node());

        $this->assertInstanceOf(Node::class, $node);
        $this->assertInstanceOf(Node::class, $node->anotherNode);
        $this->assertSame($array, $node->anotherNode->someArray);
    }
}
