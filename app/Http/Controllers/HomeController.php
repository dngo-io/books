<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Support\AppController;
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
     * Index page
     *
     * @return \Illuminate\Http\Response
     */
    public function root_index()
    {
        return view('home');
    }

    /**
     * @return array
     */
    public function steem()
    {
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
