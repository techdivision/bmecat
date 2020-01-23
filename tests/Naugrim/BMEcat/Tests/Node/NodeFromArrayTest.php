<?php

namespace Naugrim\BMEcat\Tests;

use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Node\CatalogNode;
use Naugrim\BMEcat\Node\DocumentNode;
use Naugrim\BMEcat\Node\NewCatalogNode;
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
        $document = DocumentNode::fromArray([]);
        $this->assertInstanceOf(DocumentNode::class, $document);
    }

    public function testInvalidSetter()
    {
        $this->expectException(UnknownKeyException::class);
        DocumentNode::fromArray(['thereisnosetterforthis' => 1]);
    }

    public function testScalarValue()
    {
        $document = DocumentNode::fromArray(['version' => "1234567"]);
        $this->assertEquals("1234567", $document->getVersion());
    }

    public function testObjectValue()
    {
        $catalog = new NewCatalogNode();
        $document = DocumentNode::fromArray([
            'newCatalog' => $catalog
        ]);
        $this->assertSame($catalog, $document->getNewCatalog());
    }

    public function testInvalidSetterNoArguments()
    {
        $this->expectException(InvalidSetterException::class);
        Node::fromArray([
            'noArguments' => []
        ]);
    }

    public function testInvalidSetterNoTypeHint()
    {
        $this->expectException(InvalidSetterException::class);
        Node::fromArray([
            'noTypeHint' => []
        ]);
    }

    public function testInvalidSetterScalarTypeHint()
    {
        $this->expectException(TypeError::class);
        Node::fromArray([
            'scalarTypeHint' => []
        ]);
    }

    public function testSetterMatchingTypeHintFloat()
    {
        $float = 1.23456;
        $node = Node::fromArray([
            'matchingTypeHintFloat' => $float
        ]);
        $this->assertEquals($float, $node->someFloat);
    }

    public function testSetterMatchingTypeHintArray()
    {
        $array = [];
        $node = Node::fromArray([
            'matchingTypeHintArray' => $array
        ]);
        $this->assertSame($array, $node->someArray);
    }

    public function testSetterMatchingTypeHintNode()
    {
        $anotherNode = new Node();
        $node = Node::fromArray([
            'matchingTypeHintNode' => $anotherNode
        ]);
        $this->assertSame($anotherNode, $node->anotherNode);
    }

    public function testRecursiveFromArrayWithArrays()
    {
        $array = [
            'test' => '123'
        ];

        $node = Node::fromArray([
            'matchingTypeHintNode' => [
                'matchingTypeHintArray' => $array
            ]
        ]);

        $this->assertInstanceOf(Node::class, $node);
        $this->assertInstanceOf(Node::class, $node->anotherNode);
        $this->assertSame($array, $node->anotherNode->someArray);
    }
}
