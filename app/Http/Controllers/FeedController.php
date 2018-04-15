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
     * @var string
     */
    private $partial = 'feed';

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
        switch ($this->partial)
        {
            case 'feed':
                break;
            case 'pending-approval':
                $request->request->set('status', BookAudioRepository::STATUS_PENDING);
                break;
            case 'rejected':
                $request->request->set('status', BookAudioRepository::STATUS_REJECTED);
                break;
            default:
                break;
        }

        $feed = $this->audioRepository->getUserFeed($request);

        return view('feed', [
            'count'      => $feed->count(),
            'total'      => $feed->total(),
            'partial'    => $this->partial,
            'content'    => $feed->getCollection(),
            'pagination' => $feed->appends($request->except('page'))
        ]);
    }


    /**
     * Display pending approvals on feed
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pendingApproval(Request $request)
    {
        $this->partial = 'pending-approval';
        return $this->index($request);
    }

    /**
     * Display pending approvals on feed
     *
     * @param Request $request
     * @return mixed
     */
    public function rejected(Request $request)
    {
        $this->partial = 'rejected';
        return $this->index($request);
    }
}
