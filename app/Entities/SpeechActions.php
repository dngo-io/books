<?php

namespace App\Entities;


class SpeechActions
{

    /** @var  integer */
    protected $id;

    /** @var  Speech */
    protected $parent;

    /** @var  string */
    protected $do;

    /** @var  string */
    protected $action;

    /** @var  string */
    protected $error;

    /** @var  int */
    protected $sort;

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
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Speech $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
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

    /**
     * @return int
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param int $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }

}