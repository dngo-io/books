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
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \EntityManager::getRepository(User::class)->find(1);

        return view('home', ['user' => $user]);
    }
}
