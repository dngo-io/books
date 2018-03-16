<?php

namespace App\Events;

use App\Entities\BookAudio;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AudioApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var BookAudio
     */
    private $bookAudio;

    /**
     * Create a new event instance.
     *
     * @param BookAudio $bookAudio
     */
    public function __construct(BookAudio $bookAudio)
    {
        $this->bookAudio = $bookAudio;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('audio-approved');
    }
}
