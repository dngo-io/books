<?php

namespace App\Service;


use App\Entities\Speech;
use App\Entities\SpeechActions;

class SpeechService
{

    /** @var  array */
    protected $speeches;

    /** @var  string */
    protected $question;

    /** @var  array */
    protected $response = [];

    public function __construct($speeches)
    {
        $this->speeches = $speeches;
    }


    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }


    public function resolve()
    {
        $question = strtolower($this->getQuestion());

        $result = [];

        // look for the keywords
        foreach ($this->speeches as $speech) {
            /** @var Speech $speech */
            $keywords = explode(',',$speech->getKeywords());

            foreach ($keywords as $keyword) {
                if(strpos($question,$keyword) !== false){
                    if(!isset($result[$speech->getId()])){
                        $result[$speech->getId()] = 1;
                    }else{
                        $result[$speech->getId()]++;
                    }
                }
            }
        }

        if(!empty($result)){
            //en çok value'ye gore diz.
            ksort($result);
            //ilk değeri al parçala
            reset($result);
            $result = key($result);
        }

        $this->findActions($result);

        return $this;
    }

    public function findActions($speechId)
    {
        $actions = [];
        foreach ($this->speeches as $speech) {
            /** @var Speech $speech */
            if($speech->getId() == $speechId) {

                $speechActions = $speech->getActions()->toArray();

                //sort them first;
                usort($speechActions, function($a, $b)
                {
                    return strcmp($a->getSort(), $b->getSort());
                });

                foreach ($speechActions as $speechAction) {
                    /** @var SpeechActions $speechAction */
                    $action['do'] = $speechAction->getDo();
                    $action['action'] = $speechAction->getAction();
                    $action['error'] = $speechAction->getError();

                    $actions[] = $action;
                };
                break;
            }
        }

        $this->setResponse($actions);

        return $this;
    }

    /**
     * @param array $response
     */
    public function setResponse(array $response)
    {
        if (empty($response)) {
            $return['success'] = false;
            $return['message'] = "I could not find anything to do"; //buraya daha sonra birşeyler düşünürüz
        }else{
            $return['success'] = true;
            $return['actions'] = $response;
        }

        $this->response = $return;
    }


    public function getResponse()
    {
        return $this->response;
    }


}