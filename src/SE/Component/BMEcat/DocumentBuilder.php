<?php
/**
 * This file is part of the BMEcat php library
 *
 * (c) Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SE\Component\BMEcat;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializationContext;
use SE\Component\BMEcat\Node\DocumentNode;
use SE\Component\BMEcat\Exception\MissingDocumentException;

/**
 *
 * @package SE\Component\BMEcat
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 */
class DocumentBuilder
{
    /**
     *
     * @var Serializer
     */
    protected $serializer;

    /**
     *
     * @var SerializationContext
     */
    protected $context;

    /**
     *
     * @var DocumentNode
     */
    protected $document;

    /**
     *
     * @param Serializer $serializer
     * @param SerializationContext $context
     */
    public function __construct(Serializer $serializer = null, $context = null)
    {
        if ($serializer === null) {
            $serializer = SerializerBuilder::create()->build();
        }

        if ($context === null) {
            $context = SerializationContext::create();
        }

        $this->context    = $context;
        $this->serializer = $serializer;
    }

    /**
     *
     * @param Serializer $serializer
     * @return DocumentBuilder
     */
    public static function create(Serializer $serializer = null)
    {
        return new self($serializer);
    }

    /**
     *
     * @return Serializer
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     *
     * @return SerializationContext
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param Node\DocumentNode $document
     * @return DocumentBuilder
     */
    public function setDocument(DocumentNode $document)
    {
        $this->document = $document;
        return $this;
    }

    /**
     *
     * @return DocumentNode
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     *
     * @throws MissingDocumentException
     * @return string
     */
    public function toString()
    {
        if (($document = $this->getDocument()) === null) {
            throw new MissingDocumentException('Please call ::setDocument() first.');
        }

        return $this->serializer->serialize($document, 'xml', $this->context);
    }
}
