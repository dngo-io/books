<?php

namespace App\Service;


class SpeechService
{

    /** @var  array */
    protected $speeches;

    /** @var  string */
    protected $question;

    public function __construct($speeches)
    {
        $this->speeches = $speeches;
    }


    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
    }

    public function resolve()
    {

        return $this;
    }

    public function formatter()
    {

    }


    public function getResponse()
    {
        return [];
    }

}