<?php

namespace App\Listeners;

use App\Events\AudioApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostToSteemListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AudioApproved  $event
     * @return void
     */
    public function handle(AudioApproved $event)
    {
        //send post to steem here if status is APPROVED!
    }
}
