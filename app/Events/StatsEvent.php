<?php

namespace App\Events;

use App\Entities\BookAudio;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class StatsEvent
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

}
