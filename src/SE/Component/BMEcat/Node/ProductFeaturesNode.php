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

use \JMS\Serializer\Annotation as Serializer;

use SE\Component\BMEcat\Exception\InvalidSetterException;
use SE\Component\BMEcat\Exception\UnknownKeyException;
use \SE\Component\BMEcat\Node\AbstractNode;

/**
 *
 * @package SE\Component\BMEcat
 * @author Jochen Pfaeffle <jochen.pfaeffle.dev@gmail.com>
 *
 * @Serializer\XmlRoot("PRODUCT_FEATURES")
 */
class ProductFeaturesNode extends AbstractNode
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
     * @Serializer\Exclude(if="!empty($this->referenceFeatureGroupName)")
     *
     * @var string
     */
    protected $referenceFeatureGroupId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("REFERENCE_FEATURE_GROUP_NAME")
     * @Serializer\SkipWhenEmpty
     * @Serializer\Exclude(if="!empty($this->referenceFeatureGroupId)")
     *
     * @var string
     */
    protected $referenceFeatureGroupName;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("FEATURE")
     * @Serializer\Type("array<SE\Component\BMEcat\Node\ProductFeatureNode>")
     * @Serializer\XmlList( entry="FEATURE")
     *
     * @var \SE\Component\BMEcat\Node\ProductFeatureNode[]
     */
    protected $features;

    /**
     * @param ProductFeatureNode[] $features
     * @return ProductFeaturesNode
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setFeatures(array $features): ProductFeaturesNode
    {
        $this->features = [];
        foreach ($features as $feature) {
            if (is_array($feature)) {
                $feature = ProductFeatureNode::fromArray($feature);
            }
            $this->addFeature($feature);
        }
        return $this;
    }

    /**
     * @param ProductFeatureNode $feature
     * @return ProductFeaturesNode
     */
    public function addFeature(ProductFeatureNode $feature) : ProductFeaturesNode
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
     * @return ProductFeaturesNode
     */
    public function nullFeatures() : ProductFeaturesNode
    {
        if (empty($this->features) === true) {
            $this->features = null;
        }
        return $this;
    }

    /**
     * @param string $referenceFeatureSystemName
     * @return ProductFeaturesNode
     */
    public function setReferenceFeatureSystemName($referenceFeatureSystemName) : ProductFeaturesNode
    {
        $this->referenceFeatureSystemName = $referenceFeatureSystemName;
        return $this;
    }

    /**
     * @param string $referenceFeatureGroupName
     * @return ProductFeaturesNode
     */
    public function setReferenceFeatureGroupName($referenceFeatureGroupName) : ProductFeaturesNode
    {
        $this->referenceFeatureGroupId = null;
        $this->referenceFeatureGroupName = $referenceFeatureGroupName;
        return $this;
    }

    /**
     * @param string $referenceFeatureGroupId
     * @return ProductFeaturesNode
     */
    public function setReferenceFeatureGroupId($referenceFeatureGroupId) : ProductFeaturesNode
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
     * @return ProductFeatureNode[]
     */
    public function getFeatures()
    {
        if ($this->features === null) {
            return [];
        }

        return $this->features;
    }
}