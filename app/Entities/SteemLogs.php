<?php


namespace App\Entities;


class SteemLogs
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var array
     */
    protected $request;

    /**
     * @var array
     */
    protected $response;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var BookAudio
     */
    private $bookAudio;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param array $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param array $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return BookAudio
     */
    public function getBookAudio()
    {
        return $this->bookAudio;
    }

    /**
     * @param BookAudio $bookAudio
     */
    public function setBookAudio($bookAudio)
    {
        $this->bookAudio = $bookAudio;
    }




}