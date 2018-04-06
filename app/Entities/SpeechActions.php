<?php

namespace App\Entities;


class SpeechActions
{

    /** @var  integer */
    protected $id;

    /** @var  Speech */
    protected $speech;

    /** @var  string */
    protected $do;

    /** @var  string */
    protected $action;

    /** @var  string */
    protected $error;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Speech
     */
    public function getSpeech()
    {
        return $this->speech;
    }

    /**
     * @param Speech $speech
     */
    public function setSpeech($speech)
    {
        $this->speech = $speech;
    }

    /**
     * @return string
     */
    public function getDo()
    {
        return $this->do;
    }

    /**
     * @param string $do
     */
    public function setDo($do)
    {
        $this->do = $do;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

}