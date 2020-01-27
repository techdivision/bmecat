<?php


namespace Naugrim\BMEcat\Nodes;

use DateTimeImmutable;
use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("DATETIME")
 */
class DateTimeNode extends AbstractNode
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\XmlAttribute
     *
     * @var string
     */
    protected $type = "generation_date";

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DATE")
     *
     * @var string
     */
    protected $date;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TIME")
     *
     * @var string
     */
    protected $time;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TIMEZONE")
     *
     * @var string
     */
    protected $timezone;

    /**
     * @param DateTimeImmutable $dateTime
     * @return DateTimeNode
     */
    public function setDateTime(DateTimeImmutable $dateTime) : DateTimeNode
    {
        $this->setDate($dateTime->format('Y-m-d'));
        $this->setTime($dateTime->format('H:i:s'));
        $this->setTimezone($dateTime->format('P'));
        return $this;
    }

    /**
     * @param string $date
     * @return DateTimeNode
     */
    public function setDate($date) : DateTimeNode
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $time
     * @return DateTimeNode
     */
    public function setTime($time) : DateTimeNode
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $timezone
     * @return DateTimeNode
     */
    public function setTimezone($timezone) : DateTimeNode
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }
}
