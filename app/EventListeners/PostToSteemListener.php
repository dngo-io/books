<?php

namespace App\EventListeners;

use App\Entities\BookAudio;
use App\Entities\User;
use App\Events\AudioApproved;
use App\Repositories\BookAudioRepository;
use Doctrine\ORM\EntityManager;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Steem\Steemit;

class PostToSteemListener
{
    /**
     * @var BookAudio
     */
    private $bookAudio;

    /**
     * Create the event listener.
     *
     * @param BookAudio $bookAudio
     */
    public function __construct(BookAudio $bookAudio)
    {
        $this->bookAudio = $bookAudio;
    }

    /**
     * Handle the event.
     *
     * @param  AudioApproved  $event
     * @return void
     */
    public function handle(AudioApproved $event)
    {
        /** @var EntityManager $em */
        $em = app('em');

        if ($this->bookAudio->getStatus() == BookAudioRepository::STATUS_APPROVED) {
            /** @var User $user */
            $user = $this->bookAudio->getUser();

            $steem = new Steemit();
            $response = $steem->setToken($user->getAccessToken())->exec(
                'post',
                [
                    $user->getAccount(),
                    $this->bookAudio->getName(),
                    $this->bookAudio->getBody(), //burada body'yi transform edebiliriz. ek metin ekleme vs.
                    array_merge(['dngo'],$this->bookAudio->getTags()->toArray()),
                    config('steem.account')
                ]
            );

            //update steem slug and post first comment
            $response;
        }
    }

}
