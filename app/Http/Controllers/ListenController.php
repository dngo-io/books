<?php

namespace App\Http\Controllers;

use App\Service\BookAudioService;
use App\Support\AppController;
use SteemAPI\SteemAPI;
use Illuminate\Support\Facades\Cache;

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
        if (Cache::has("book_audio_{$id}") && 0) {
            $result = Cache::get("book_audio_{$id}");
        } else {
            $bookAudio = $this->bookAudioService->find($id);
            $steem     = new SteemAPI();
            $replies   = $steem->getPost()->getContentAllReplies($bookAudio['user']['account'], $bookAudio['audio']['slug']);

            $result    = [
                'content' => $bookAudio,
                'body'    => $steem->getPost()->getContent($bookAudio['user']['account'], $bookAudio['audio']['slug']),
                'replies' => $replies,
            ];

            Cache::put("book_audio_{$id}", $result, config('cache.expire'));
        }

        return view('audio-listen', ['id' => $id, 'data' => $result]);
    }

    /**
     * Embed player
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function embed($id)
    {
        $bookAudio = $this->bookAudioService->find($id);
        return view('audio-embed', ['data' => $bookAudio]);
    }
}
