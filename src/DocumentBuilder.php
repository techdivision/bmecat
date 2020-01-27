<?php


namespace Naugrim\BMEcat;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializationContext;
use Naugrim\BMEcat\Nodes\DocumentNode;
use Naugrim\BMEcat\Exception\MissingDocumentException;

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
     * @param Nodes\DocumentNode $document
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
