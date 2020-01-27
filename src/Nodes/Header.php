<?php


namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("HEADER")
 */
class Header implements Contracts\NodeInterface
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
     * @return Header
     */
    public function setGeneratorInfo($generatorInfo) : Header
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
     * @return Header
     */
    public function setCatalog(Catalog $catalog) : Header
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
     * @return Header
     */
    public function setSupplier(SupplierNode $supplier) : Header
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
