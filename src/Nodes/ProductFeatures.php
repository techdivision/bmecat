<?php


namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    \JMS\Serializer\Annotation as Serializer;

use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;

/**
 *
 * @Serializer\XmlRoot("PRODUCT_FEATURES")
 */
class ProductFeatures implements Contracts\NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("REFERENCE_FEATURE_SYSTEM_NAME")
     *
     * @var string
     */
    protected $referenceFeatureSystemName;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("REFERENCE_FEATURE_GROUP_ID")
     * @Serializer\SkipWhenEmpty
     * @Serializer\Exclude(if="!empty(object.getReferenceFeatureGroupName())")
     *
     * @var string
     */
    protected $referenceFeatureGroupId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("REFERENCE_FEATURE_GROUP_NAME")
     * @Serializer\SkipWhenEmpty
     * @Serializer\Exclude(if="!empty(object.getReferenceFeatureGroupId())")
     *
     * @var string
     */
    protected $referenceFeatureGroupName;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("FEATURE")
     * @Serializer\Type("array<Naugrim\BMEcat\Nodes\ProductFeature>")
     * @Serializer\XmlList( entry="FEATURE")
     *
     * @var ProductFeature[]
     */
    protected $features;

    /**
     * @param ProductFeature[] $features
     * @return ProductFeatures
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setFeatures(array $features): ProductFeatures
    {
        $this->features = [];
        foreach ($features as $feature) {
            if (is_array($feature)) {
                $feature = NodeBuilder::fromArray($feature, new ProductFeature());
            }
            $this->addFeature($feature);
        }
        return $this;
    }

    /**
     * @param ProductFeature $feature
     * @return ProductFeatures
     */
    public function addFeature(ProductFeature $feature) : ProductFeatures
    {
        if ($this->features === null) {
            $this->features = [];
        }
        $this->features[] = $feature;
        return $this;
    }

    /**
     *
     * @Serializer\PreSerialize
     * @Serializer\PostSerialize
     * @return ProductFeatures
     */
    public function nullFeatures() : ProductFeatures
    {
        if (empty($this->features) === true) {
            $this->features = null;
        }
        return $this;
    }

    /**
     * @param string $referenceFeatureSystemName
     * @return ProductFeatures
     */
    public function setReferenceFeatureSystemName($referenceFeatureSystemName) : ProductFeatures
    {
        $this->referenceFeatureSystemName = $referenceFeatureSystemName;
        return $this;
    }

    /**
     * @param string $referenceFeatureGroupName
     * @return ProductFeatures
     */
    public function setReferenceFeatureGroupName($referenceFeatureGroupName) : ProductFeatures
    {
        $this->referenceFeatureGroupId = null;
        $this->referenceFeatureGroupName = $referenceFeatureGroupName;
        return $this;
    }

    /**
     * @param string $referenceFeatureGroupId
     * @return ProductFeatures
     */
    public function setReferenceFeatureGroupId($referenceFeatureGroupId) : ProductFeatures
    {
        $this->referenceFeatureGroupName = null;
        $this->referenceFeatureGroupId = $referenceFeatureGroupId;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceFeatureSystemName()
    {
        return $this->referenceFeatureSystemName;
    }

    /**
     * @return string
     */
    public function getReferenceFeatureGroupName()
    {
        return $this->referenceFeatureGroupName;
    }

    /**
     * @return string
     */
    public function getReferenceFeatureGroupId()
    {
        return $this->referenceFeatureGroupId;
    }

    /**
     * @return ProductFeature[]
     */
    public function getFeatures()
    {
        if ($this->features === null) {
            return [];
        }

        return $this->features;
    }
}
