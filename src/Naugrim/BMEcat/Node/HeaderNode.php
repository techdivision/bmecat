<?php


namespace Naugrim\BMEcat\Node;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("HEADER")
 */
class HeaderNode extends AbstractNode
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("GENERATOR_INFO")
     *
     * @var string
     */
    protected $generatorInfo;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Node\CatalogNode")
     * @Serializer\SerializedName("CATALOG")
     *
     * @var \Naugrim\BMEcat\Node\CatalogNode
     */
    protected $catalog;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Node\SupplierNode")
     * @Serializer\SerializedName("SUPPLIER")
     *
     * @var \Naugrim\BMEcat\Node\SupplierNode
     */
    protected $supplier;

    /**
     * @param string $generatorInfo
     * @return HeaderNode
     */
    public function setGeneratorInfo($generatorInfo) : HeaderNode
    {
        $this->generatorInfo = $generatorInfo;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getGeneratorInfo()
    {
        return $this->generatorInfo;
    }

    /**
     * @param \Naugrim\BMEcat\Node\CatalogNode $catalog
     * @return HeaderNode
     */
    public function setCatalog(CatalogNode $catalog) : HeaderNode
    {
        $this->catalog = $catalog;
        return $this;
    }

    /**
     * @return \Naugrim\BMEcat\Node\CatalogNode $catalog
     */
    public function getCatalog()
    {
        return $this->catalog;
    }

    /**
     * @param \Naugrim\BMEcat\Node\SupplierNode $supplier
     * @return HeaderNode
     */
    public function setSupplier(SupplierNode $supplier) : HeaderNode
    {
        $this->supplier = $supplier;
        return $this;
    }

    /**
     * @return \Naugrim\BMEcat\Node\SupplierNode
     */
    public function getSupplier()
    {
        return $this->supplier;
    }
}
