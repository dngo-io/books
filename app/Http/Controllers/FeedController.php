<?php

namespace App\Http\Controllers;

use App\Support\AppController;
use Illuminate\Http\Request;
use App\Repositories\BookAudioRepository;

/**
 * Class FeedController
 *
 * @package    App\Http\Controllers
 * @subpackage App\Http\Controllers\HomeController
 */
class FeedController extends AppController
{
    /**
     * @var BookAudioRepository
     */
    private $audioRepository;

    /**
     * HomeController constructor
     *
     * @param BookAudioRepository $audioRepository
     */
    public function __construct(BookAudioRepository $audioRepository)
    {
        $this->audioRepository  = $audioRepository;
    }

    /**
     * Home page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $feed = $this->audioRepository->getUserFeed($request);

        return view('feed', [
            'count'      => $feed->count(),
            'total'      => $feed->total(),
            'content'    => $feed->getCollection(),
            'pagination' => $feed->appends($request->except('page'))
        ]);
    }
}
