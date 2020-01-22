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

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @package SE\Component\BMEcat
 * @author Sven Eisenschmidt <sven.eisenschmidt@gmail.com>
 *
 * @Serializer\XmlRoot("CATALOG")
 */
class CatalogNode extends AbstractNode
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LANGUAGE")
     *
     * @var string
     */
    protected $language;

    /**
      * @Serializer\Expose
      * @Serializer\Type("string")
      * @Serializer\SerializedName("CATALOG_ID")
      *
      * @var string
      */
    protected $id;

    /**
      * @Serializer\Expose
      * @Serializer\Type("string")
      * @Serializer\SerializedName("CATALOG_VERSION")
      *
      * @var string
      */
    protected $version;

    /**
     * @Serializer\Expose
     * @Serializer\Type("SE\Component\BMEcat\Node\DateTimeNode")
     * @Serializer\SerializedName("DATETIME")
     *
     * @var DateTimeNode
     */
    protected $dateTime;

    /**
     * @param string $language
     * @return CatalogNode
     */
    public function setLanguage(string $language) : CatalogNode
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @param string $id
     * @return CatalogNode
     */
    public function setId(string $id) : CatalogNode
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $version
     * @return CatalogNode
     */
    public function setVersion(string $version) : CatalogNode
    {
        $this->version = $version;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
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
     *
     * @param DateTimeNode $dateTime
     * @return CatalogNode
     */
    public function setDateTime(DateTimeNode $dateTime) : CatalogNode
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    /**
     *
     * @return DateTimeNode
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }
}
