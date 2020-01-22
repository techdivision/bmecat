<?php
/**
 * This file is part of the BMEcat php library
 *
 * (c) Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SE\Component\BMEcat\Tests;

use SE\Component\BMEcat\Node\DocumentNode;

/**
 *
 * @package SE\Component\BMEcat\Tests
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 */
class DocumentBuilderTest extends \PHPUnit\Framework\TestCase
{

    public function setUp() : void
    {
        $this->serializer = \JMS\Serializer\SerializerBuilder::create()->build();
    }

    /**
     *
     * @test
     */
    public function Can_Be_Instantiated()
    {
        $builder = new \SE\Component\BMEcat\DocumentBuilder($this->serializer);
        $this->assertInstanceOf(\SE\Component\BMEcat\DocumentBuilder::class, $builder);
    }

    /**
     *
     * @test
     */
    public function Sets_Up_Default_Dependencies()
    {
        $builder = new \SE\Component\BMEcat\DocumentBuilder();
        $this->assertInstanceOf('\JMS\Serializer\Serializer', $builder->getSerializer());
    }

    /**
     *
     * @test
     */
    public function Instantiate_Via_Static_Method()
    {
        $builder = \SE\Component\BMEcat\DocumentBuilder::create($this->serializer);
        $this->assertInstanceOf('\JMS\Serializer\Serializer', $builder->getSerializer());
    }

    /**
     *
     * @test
     */
    public function To_String_Returns_Default_Document_Without_Null_Values()
    {
        $builder = new \SE\Component\BMEcat\DocumentBuilder;
        $document = DocumentNode::fromArray([]);
        $builder->setDocument($document);

        $expected = file_get_contents(__DIR__.'/Fixtures/empty_document_without_null_values.xml');
        $this->assertEquals($expected, $builder->toString());

    }

    /**
     *
     * @test
     */
    public function To_String_Throws_Exception()
    {
        $this->expectException(\SE\Component\BMEcat\Exception\MissingDocumentException::class);
        $builder = new \SE\Component\BMEcat\DocumentBuilder;
        $builder->toString();
    }
}