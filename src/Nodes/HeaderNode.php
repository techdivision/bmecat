<?php


namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("HEADER")
 */
class HeaderNode implements Contracts\NodeInterface
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
     * @Serializer\Type("Naugrim\BMEcat\Nodes\CatalogNode")
     * @Serializer\SerializedName("CATALOG")
     *
     * @var \Naugrim\BMEcat\Nodes\CatalogNode
     */
    protected $catalog;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\SupplierNode")
     * @Serializer\SerializedName("SUPPLIER")
     *
     * @var \Naugrim\BMEcat\Nodes\SupplierNode
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
     * @param \Naugrim\BMEcat\Nodes\CatalogNode $catalog
     * @return HeaderNode
     */
    public function setCatalog(CatalogNode $catalog) : HeaderNode
    {
        $this->catalog = $catalog;
        return $this;
    }

    /**
     * @return \Naugrim\BMEcat\Nodes\CatalogNode $catalog
     */
    public function getCatalog()
    {
        return $this->catalog;
    }

    /**
     * @param \Naugrim\BMEcat\Nodes\SupplierNode $supplier
     * @return HeaderNode
     */
    public function setSupplier(SupplierNode $supplier) : HeaderNode
    {
        $this->supplier = $supplier;
        return $this;
    }

    /**
     * @return \Naugrim\BMEcat\Nodes\SupplierNode
     */
    public function getSupplier()
    {
        return $this->supplier;
    }
}
