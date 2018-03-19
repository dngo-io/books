<?php

namespace App\Http\Controllers;

use App\Service\BookAudioService;
use App\Support\AppController;

class ListenController extends AppController
{
    /**
     * @var BookAudioService
     */
    private $bookAudioService;

    /**
     * ListenController constructor
     *
     * @param BookAudioService $bookAudioService
     */
    public function __construct(BookAudioService $bookAudioService)
    {
        $this->bookAudioService = $bookAudioService;
    }

    /**
     * Listen to an book audio
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $bookAudio = $this->bookAudioService->find($id);

        return view('audio-listen', ['id' => $id, 'data' => $bookAudio]);
    }

    public function embed($id)
    {
        $bookAudio = $this->bookAudioService->find($id);
        return view('audio-embed', ['data' => $bookAudio]);
    }
}
