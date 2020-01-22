<?php

namespace Naugrim\BMEcat\Tests;

use PHPUnit\Framework\TestCase;
use SE\Component\BMEcat\Exception\SchemaValidationException;
use SE\Component\BMEcat\Exception\UnsupportedVersionException;
use SE\Component\BMEcat\SchemaValidator;


class SchemaValidatorTest extends TestCase
{

    /**
     * @var
     */
    protected $minimalValidDocument;

    protected function setUp(): void
    {
        parent::setUp();

        $this->minimalValidDocument = file_get_contents(__DIR__ . '/Fixtures/2005.1/minimal_valid_document.xml');

    }

    public function testInvalidVersion()
    {
        $this->expectException(UnsupportedVersionException::class);
        SchemaValidator::isValid('<xml/>', 'invalid');
    }

    public function testInvalidType()
    {
        $this->expectException(UnsupportedVersionException::class);
        SchemaValidator::isValid('<xml/>', '1.2', 'invalid');
    }

    public function testInvalidXml()
    {
        $this->expectException(SchemaValidationException::class);
        SchemaValidator::isValid('<xml/>', '2005.1');
    }

    public function testVersionThatHasNoType()
    {
        $this->assertTrue(
            SchemaValidator::isValid($this->minimalValidDocument, '2005.1', 'invalid')
        );
    }


}
