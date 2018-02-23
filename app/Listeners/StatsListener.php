<?php

namespace App\Listeners;

use App\Entities\BookAudio;
use App\Events\StatsEvent;
use Doctrine\ORM\EntityManagerInterface;

class StatsListener
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * Create the event listener.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    /**
     * Handle the event.
     *
     * @param  StatsEvent  $event
     * @return void
     */
    public function handle(StatsEvent $event)
    {
        dd($event));
    }
}
