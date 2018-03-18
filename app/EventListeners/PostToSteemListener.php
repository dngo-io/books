<?php

namespace App\EventListeners;

use App\Entities\BookAudio;
use App\Entities\SteemLogs;
use App\Entities\User;
use App\Events\AudioApproved;
use App\Repositories\BookAudioRepository;
use Doctrine\ORM\EntityManager;
use Illuminate\Support\Facades\Auth;
use Steem\Steemit;

class PostToSteemListener
{
    /**
     * @var BookAudio
     */
    private $bookAudio;


    /**
     * Handle the event.
     *
     * @param  AudioApproved  $event
     * @return void
     */
    public function handle(AudioApproved $event)
    {
        $this->bookAudio = $event->bookAudio;

        /** @var EntityManager $em */
        $em = app('em');

        if ($this->bookAudio->getStatus() == BookAudioRepository::STATUS_APPROVED) {
            /** @var User $user */
            $user = $this->bookAudio->getUser();

            $steem = new Steemit();

            $exec =
                [
                    $user->getAccount(),
                    $this->bookAudio->getName(),
                    $this->bookAudio->getBody(), //burada body'yi transform edebiliriz. ek metin ekleme vs.
                    array_merge(['dngo'],$this->bookAudio->getTags()->toArray()),
                    config('steem.account')
                ];

            $response = $steem->setToken($user->getAccessToken())->exec('post',$exec);

            if($response['error'] || !$response['result']) {
                //log
                $this->log($response,$exec,'post',$em);
            }else{
                //update steem slug and post first comment
                $slug = sprintf("@%s/%s",$response['operations']['comment']['author'],$response['operations']['comment']['permlink']);

                $this->bookAudio->setSteemSlug($slug);
                $this->bookAudio->activate();
                $em->flush($this->bookAudio);

                //add first comment
                $user = Auth::user();
                $exec =
                    [
                        $response['operations']['comment']['author'],
                        $response['operations']['comment']['permlink'],
                        $user->getAccount(),
                        $this->bookAudio->getModComment(),
                        $this->bookAudio->getModComment(),
                        config('steem.account')
                    ];

                $response = $steem->setToken($user->getAccessToken())->exec('comment',$exec);

                if($response['error'] || !$response['result']){
                    $this->log($response,$exec,'comment',$em);
                }

            }

        }
    }


    /**
     * Refactor for loggin in mysql
     * @param $response
     * @param $request
     * @param $type
     * @param EntityManager $em
     * @internal param $log
     */
    public function log($response,$request, $type, EntityManager $em)
    {
        $log = new SteemLogs();
        $log->setRequest($request);
        $log->setResponse($response);
        $log->setType($type);
        $em->persist($log);
        $em->flush();
    }

}
