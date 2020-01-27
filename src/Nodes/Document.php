<?php


namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("BMECAT")
 * @Serializer\ExclusionPolicy("all")
 */
class Document implements Contracts\NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\XmlAttribute
     */
    protected $version = '2005.1';

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("xmlns")
     * @Serializer\XmlAttribute
     */
    protected $namespace = 'http://www.bmecat.org/bmecat/2005.1';

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\HeaderNode")
     * @Serializer\SerializedName("HEADER")
     *
     * @var \Naugrim\BMEcat\Nodes\HeaderNode
     */
    protected $header;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\NewCatalogNode")
     * @Serializer\SerializedName("T_NEW_CATALOG")
     *
     * @var NewCatalogNode
     */
    protected $catalog;

    /**
     *
     * @param string $version
     * @return Document
     */
    public function setVersion($version) : Document
    {
        $this->version = $version;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param \Naugrim\BMEcat\Nodes\HeaderNode $header
     * @return Document
     */
    public function setHeader(HeaderNode $header) : Document
    {
        $this->header = $header;
        return $this;
    }

    /**
     *
     * @return \Naugrim\BMEcat\Nodes\HeaderNode
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param NewCatalogNode $catalog
     * @return Document
     */
    public function setNewCatalog(NewCatalogNode $catalog) : Document
    {
        $this->catalog = $catalog;
        return $this;
    }

    /**
     * @return NewCatalogNode
     */
    public function getNewCatalog()
    {
        return $this->catalog;
    }
}
