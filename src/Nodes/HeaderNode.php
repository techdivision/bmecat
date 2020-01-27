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
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Catalog")
     * @Serializer\SerializedName("CATALOG")
     *
     * @var Catalog
     */
    protected $catalog;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\SupplierNode")
     * @Serializer\SerializedName("SUPPLIER")
     *
     * @var SupplierNode
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
     * @param Catalog $catalog
     * @return HeaderNode
     */
    public function setCatalog(Catalog $catalog) : HeaderNode
    {
        $this->catalog = $catalog;
        return $this;
    }

    /**
     * @return Catalog $catalog
     */
    public function getCatalog()
    {
        return $this->catalog;
    }

    /**
     * @param SupplierNode $supplier
     * @return HeaderNode
     */
    public function setSupplier(SupplierNode $supplier) : HeaderNode
    {
        $this->supplier = $supplier;
        return $this;
    }

    /**
     * @return SupplierNode
     */
    public function getSupplier()
    {
        return $this->supplier;
    }
}
