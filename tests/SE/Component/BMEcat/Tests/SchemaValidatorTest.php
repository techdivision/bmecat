<?php

namespace SE\Component\BMEcat\Tests;

use SE\Component\BMEcat\Exception\SchemaValidationException;
use SE\Component\BMEcat\Exception\UnsupportedVersionException;
use SE\Component\BMEcat\SchemaValidator;

/**
 *
 * @package SE\Component\BMEcat\Tests
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 */
class SchemaValidatorTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var
     */
    protected $minimalValidDocument;

    protected function setUp(): void
    {
        parent::setUp();

        $this->minimalValidDocument = file_get_contents(__DIR__.'/Fixtures/2005.1/minimal_valid_document.xml');

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
