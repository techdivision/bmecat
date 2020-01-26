<?php


namespace Naugrim\BMEcat\Tests\Node;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use Naugrim\BMEcat\Node\DateTimeNode;


class DateTimeNodeTest extends TestCase
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
    public function Set_Get_Date()
    {
        $node = new DateTimeNode();
        $value = '1979-01-10';

        $this->assertNull($node->getDate());
        $node->setDate($value);
        $this->assertEquals($value, $node->getDate());
    }

    /**
     *
     * @test
     */
    public function Set_Get_Time()
    {
        $node = new DateTimeNode();
        $value = '10:59:54';

        $this->assertNull($node->getTime());
        $node->setTime($value);
        $this->assertEquals($value, $node->getTime());
    }

    /**
     *
     * @test
     */
    public function Set_Get_TimeZone()
    {
        $node = new DateTimeNode();
        $value = '-01:00';

        $this->assertNull($node->getTimeZone());
        $node->setTimeZone($value);
        $this->assertEquals($value, $node->getTimeZone());
    }

    /**
     *
     * @test
     */
    public function Serialize_With_Null_Values()
    {
        $node = new DateTimeNode();
        $context = SerializationContext::create()->setSerializeNull(true);

        $expected = file_get_contents(__DIR__ . '/../Fixtures/empty_datetime_with_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }

    /**
     *
     * @test
     */
    public function Serialize_Without_Null_Values()
    {
        $node = new DateTimeNode();
        $context = SerializationContext::create()->setSerializeNull(false);

        $expected = file_get_contents(__DIR__ . '/../Fixtures/empty_datetime_without_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }
}
