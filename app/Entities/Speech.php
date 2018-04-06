<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Somnambulist\Doctrine\Traits\Timestampable;

class Speech
{

    use Timestampable;

    /** @var  integer */
    protected $id;

    /** @var  string */
    protected $module;

    /** @var  string */
    protected $language;

    /** @var  string */
    protected $keywords;

    /** @var  ArrayCollection|SpeechActions[] */
    protected $actions;


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
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @param string $module
     */
    public function setModule($module)
    {
        $this->module = $module;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return SpeechActions[]|ArrayCollection
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * @param SpeechActions[]|ArrayCollection $actions
     */
    public function setActions($actions)
    {
        $this->actions = $actions;
    }

}