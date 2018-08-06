<?php

namespace App\Entities;


class Crawler
{

    const STATUS_SCANNED = "scanned";

    const STATUS_IMPORTED = "new_imported";

    const STATUS_ALREADY_IMPORTED = "already_imported";

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $identifier;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $source;

    public function __construct()
    {
        $this->setStatus(self::STATUS_SCANNED);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }


}