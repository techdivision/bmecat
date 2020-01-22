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
 * @Serializer\XmlRoot("SUPPLIER")
 */
class SupplierNode extends AbstractNode
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SUPPLIER_ID")
     *
     * @var string
     */
    protected $id;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SUPPLIER_NAME")
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @param string $id
     * @return SupplierNode
     */
    public function setId($id) : SupplierNode
    {
        $this->id = $id;
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
     * @param string $name
     * @return SupplierNode
     */
    public function setName($name) : SupplierNode
    {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
