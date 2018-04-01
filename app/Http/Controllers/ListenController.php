<?php

namespace App\Http\Controllers;

use App\Entities\BookAudio;
use App\Repositories\BookAudioRepository;
use App\Service\BookAudioService;
use App\Support\AppController;
use Illuminate\Support\Facades\Storage;
use SteemAPI\SteemAPI;
use Illuminate\Support\Facades\Cache;

class ListenController extends AppController
{
    /**
     * @var BookAudioService
     */
    private $bookAudioService;
    /**
     * @var BookAudioRepository
     */
    private $audioRepository;

    /**
     * ListenController constructor
     *
     * @param BookAudioService $bookAudioService
     * @param BookAudioRepository $audioRepository
     */
    public function __construct(
        BookAudioService $bookAudioService,
        BookAudioRepository $audioRepository
    )
    {
        $this->bookAudioService = $bookAudioService;
        $this->audioRepository = $audioRepository;
    }

    /**
     * Listen to an book audio
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        /** @var BookAudio $bookAudio */
        $bookAudio = $this->audioRepository->find($id);

        if(!$bookAudio) {
            return abort(404);
        }

        $is_playable = $bookAudio->getStatus() == BookAudioRepository::STATUS_APPROVED || $bookAudio->getUser()->getId() == auth()->id();

        $result = [];
        if($bookAudio->getStatus() == BookAudioRepository::STATUS_APPROVED)
        {
            if (Cache::has("book_audio_{$id}")) {
                $result = Cache::get("book_audio_{$id}");
            } else {

                $result['replies'] = NULL;
                $result['body'] = NULL;

                if( NULL !== $bookAudio->getSteemSlug()) {
                    $steem   = new SteemAPI();
                    $author  = $bookAudio->getUser()->getAccount();

                    $slug    = explode('/',$bookAudio->getSteemSlug());
                    $slug    = end($slug);

                    $body    = $steem->getPost()->getContent(  $author, $slug);
                    $votes   = $steem->getPost()->getVotes(  $author, $slug);
                    $replies = $steem->getPost()->getContentAllReplies(  $author, $slug);
                    $result  = [
                        'body'    => $body,
                        'replies' => $replies,
                        'votes'   => $votes,
                    ];

                    Cache::put("book_audio_{$id}", $result, config('cache.expire'));
                }else {
                    return abort(500);
                }
            }
        }

        $result['fileSource'] = Storage::disk('s3')->temporaryUrl(remote_path($bookAudio->getFileSource()), now()->addMinutes(30));

        return view('audio-listen', [
            'id'          => $id,
            'audio'       => $bookAudio,
            'data'        => $result,
            'is_playable' => $is_playable
        ]);
    }

    /**
     * Embed player
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function embed($id)
    {
        /** @var BookAudio $bookAudio */
        $bookAudio = $this->audioRepository->find($id);

        if(is_null($bookAudio) || $bookAudio->getStatus() != BookAudioRepository::STATUS_APPROVED)
        {
            return view('errors.404-embed');
        }

        $file      = Storage::disk('s3')->temporaryUrl(remote_path($bookAudio->getFileSource()), now()->addMinutes(30));

        return view('audio-embed', [
            'audio' => $bookAudio,
            'file'  => $file
        ]);
    }
}
