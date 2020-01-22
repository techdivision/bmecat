<?php

namespace SE\Component\BMEcat\Node;

use \JMS\Serializer\Annotation as Serializer;

/**
 *
 * @package SE\Component\BMEcat
 * @author Jochen Pfaeffle <jochen.pfaeffle.dev@gmail.com>
 *
 * @Serializer\XmlRoot("MIME")
 */
class MimeNode extends AbstractNode
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MIME_TYPE")
     *
     * @var string
     */
    protected $type;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MIME_SOURCE")
     *
     * @var string
     */
    protected $source;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MIME_DESCR")
     *
     * @var string
     */
    protected $description;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MIME_ALT")
     *
     * @var string
     */
    protected $alt;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MIME_PURPOSE")
     *
     * @var string
     */
    protected $purpose;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return MimeNode
     */
    public function setType($type) : MimeNode
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return MimeNode
     */
    public function setSource($source) : MimeNode
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return MimeNode
     */
    public function setDescription($description) : MimeNode
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     * @return MimeNode
     */
    public function setAlt($alt) : MimeNode
    {
        $this->alt = $alt;
        return $this;
    }

    /**
     * @return string
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * @param string $purpose
     * @return MimeNode
     */
    public function setPurpose($purpose) : MimeNode
    {
        $this->purpose = $purpose;
        return $this;
    }
}