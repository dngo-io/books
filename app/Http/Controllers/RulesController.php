<?php

namespace App\Http\Controllers;

use App\Support\AppController;

/**
 * Class RulesController
 *
 * @package App\Http\Controllers
 */
class RulesController extends AppController
{
    /**
     * Rules page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rules');
    }
}
