<?php
/**
 * This file is part of the BMEcat php library
 *
 * (c) Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SE\Component\BMEcat\Node;

use JMS\Serializer\Annotation as Serializer;

use SE\Component\BMEcat\Node\AbstractNode;
use SE\Component\BMEcat\Node\HeaderNode;

/**
 *
 * @package SE\Component\BMEcat
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 *
 * @Serializer\XmlRoot("BMECAT")
 * @Serializer\ExclusionPolicy("all")
 */
class DocumentNode extends AbstractNode
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
     * @Serializer\Type("SE\Component\BMEcat\Node\HeaderNode")
     * @Serializer\SerializedName("HEADER")
     *
     * @var \SE\Component\BMEcat\Node\HeaderNode
     */
    protected $header;

    /**
     * @Serializer\Expose
     * @Serializer\Type("SE\Component\BMEcat\Node\NewCatalogNode")
     * @Serializer\SerializedName("T_NEW_CATALOG")
     *
     * @var \SE\Component\BMEcat\Node\NewCatalogNode
     */
    protected $catalog;

    /**
     *
     * @param string $version
     * @return DocumentNode
     */
    public function setVersion($version) : DocumentNode
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
     * @param \SE\Component\BMEcat\Node\HeaderNode $header
     * @return DocumentNode
     */
    public function setHeader(HeaderNode $header) : DocumentNode
    {
        $this->header = $header;
        return $this;
    }

    /**
     *
     * @return \SE\Component\BMEcat\Node\HeaderNode
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param \SE\Component\BMEcat\Node\NewCatalogNode $catalog
     * @return DocumentNode
     */
    public function setNewCatalog(NewCatalogNode $catalog) : DocumentNode
    {
        $this->catalog = $catalog;
        return $this;
    }

    /**
     * @return \SE\Component\BMEcat\Node\NewCatalogNode
     */
    public function getNewCatalog()
    {
        return $this->catalog;
    }
}