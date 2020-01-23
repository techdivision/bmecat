<?php


namespace Naugrim\BMEcat\Tests\Node;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use Naugrim\BMEcat\Node\MimeNode;

class MimeNodeTest extends TestCase
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
    public function Set_Get_Type()
    {
        $node = new MimeNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getType());
        $node->setType($value);
        $this->assertEquals($value, $node->getType());
    }

    /**
     * @test
     */
    public function Set_Get_Source()
    {
        $node = new MimeNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getSource());
        $node->setSource($value);
        $this->assertEquals($value, $node->getSource());
    }

    /**
     * @test
     */
    public function Set_Get_Purpose()
    {
        $node = new MimeNode();
        $value = sha1(uniqid(microtime(false), true));

        $this->assertNull($node->getPurpose());
        $node->setPurpose($value);
        $this->assertEquals($value, $node->getPurpose());
    }

    /**
     *
     * @test
     */
    public function Serialize_With_Null_Values()
    {
        $node = new MimeNode();
        $context = SerializationContext::create()->setSerializeNull(true);

        $expected = file_get_contents(__DIR__ . '/../Fixtures/empty_mime_info_with_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }

    /**
     *
     * @test
     */
    public function Serialize_Without_Null_Values()
    {
        $node = new MimeNode();
        $context = SerializationContext::create()->setSerializeNull(false);

        $expected = file_get_contents(__DIR__ . '/../Fixtures/empty_mime_info_without_null_values.xml');
        $actual = $this->serializer->serialize($node, 'xml', $context);

        $this->assertEquals($expected, $actual);
    }
}
