<?php

namespace Naugrim\BMEcat\Tests\Node;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use Naugrim\BMEcat\Node\ProductStatusNode;

class ProductStatusNodeTest extends TestCase
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
     * @test
     */
    public function Serialize_With_Null_Values()
    {
        $node = new ProductStatusNode();
        $context = SerializationContext::create()->setSerializeNull(true);

        $expected = file_get_contents(__DIR__ . '/../Fixtures/empty_product_status_with_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function Serialize_Without_Null_Values()
    {
        $node = new ProductStatusNode();
        $context = SerializationContext::create()->setSerializeNull(false);

        $expected = file_get_contents(__DIR__ . '/../Fixtures/empty_product_status_without_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }
}
