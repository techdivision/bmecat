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

use SE\Component\BMEcat\DataLoader;
use SE\Component\BMEcat\NodeLoader;
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
     * @var \JMS\Serializer\Serializer
     */
    protected $serializer;

    /**
     *
     * @var \JMS\Serializer\SerializationContext
     */
    protected $context;

    /**
     *
     * @var \SE\Component\BMEcat\NodeLoader
     */
    protected $loader;

    /**
     *
     * @var \SE\Component\BMEcat\Node\DocumentNode
     */
    protected $document;

    /**
     *
     * @param \JMS\Serializer\Serializer $serializer
     * @param \SE\Component\BMEcat\NodeLoader $loader
     */
    public function __construct(Serializer $serializer = null, NodeLoader $loader = null, $context = null)
    {
        if($serializer === null) {
            $serializer = SerializerBuilder::create()->build();
        }

        if($context === null) {
            $context = SerializationContext::create();
        }


        if($loader === null) {
            $loader = new NodeLoader();
        }

        $this->context    = $context;
        $this->serializer = $serializer;
        $this->loader     = $loader;
    }

    /**
     *
     * @param \JMS\Serializer\Serializer $serializer
     * @param \SE\Component\BMEcat\NodeLoader $loader
     * @return \SE\Component\BMEcat\DocumentBuilder
     */
    public static function create(Serializer $serializer = null, NodeLoader $loader = null)
    {
        return new self($serializer, $loader);
    }

    /**
     *
     * @return \SE\Component\BMEcat\NodeLoader
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     *
     * @return \JMS\Serializer\Serializer
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     *
     * @return \JMS\Serializer\SerializationContext
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     *
     * @param Node\DocumentNode $document
     * @return \SE\Component\BMEcat\NodeLoader
     */
    public function setDocument(DocumentNode $document)
    {
        $this->document = $document;
    }

    /**
     *
     * @return \SE\Component\BMEcat\Node\DocumentNode
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     *
     * @param array $data
     */
    public function load(array $data)
    {
        DataLoader::load($data, $this);
    }

    /**
     *
     * @param $bool
     */
    public function setSerializeNull($bool)
    {
        $this->context->setSerializeNull($bool);
    }
    
    /**
     *
     * @throws \SE\Component\BMEcat\Exception\MissingDocumentException
     * @return string
     */
    public function toString()
    {
        if(($document = $this->getDocument()) === null) {
            throw new MissingDocumentException('No Document built. Please call ::build first.');
        }

        return $this->serializer->serialize($document, 'xml', $this->context);
    }
}
