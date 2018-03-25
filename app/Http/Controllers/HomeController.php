<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Support\AppController;
use Illuminate\Http\Request;
use App\Repositories\BookAudioRepository;
use Steem\Steemit;

/**
 * Class HomeController
 *
 * @package    App\Http\Controllers
 * @subpackage App\Http\Controllers\HomeController
 */
class HomeController extends AppController
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
     * Index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function root_index(Request $request)
    {
        if(\Auth::check())
        {
            $feed = $this->audioRepository->getUserFeed($request);

            return view('feed', [
                'count'      => $feed->count(),
                'content'    => $feed->getCollection(),
                'pagination' => $feed->appends($request->except('page'))
            ]);
        }
        else
            return view('home');
    }

    /**
     * @return array
     */
    public function steem()
    {
        dd('DANGER ZONE!');

        $token  = \Auth::user()->getAccessToken();
        $author = \Auth::user()->getAccount();
        $title  = 'I do post from my local machine!';
        $body   = 'I wish I had a test net to try it! I\'m posting from my local machine.';

        $steem    = new Steemit();

        $response = $steem->setToken($token)->exec(
            'post',
            [
                $author,
                $title,
                $body,
                ['PHP'],
                config('steem.account')
            ]
        );
        return $response;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $user = \EntityManager::getRepository(User::class)->find(1);

        return view('profile', ['user' => $user]);
    }
}
