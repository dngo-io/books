<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Support\AppController;

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
