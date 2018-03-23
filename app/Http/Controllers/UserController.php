<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Repositories\BookAudioRepository;
use App\Repositories\UserRepository;
use App\Support\AppController;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;
use SteemAPI\SteemAPI;
use Illuminate\Support\Facades\Cache;


class UserController extends AppController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var BookAudioRepository
     */
    private $audioRepository;

    /**
     * UserController constructor.
     * @param EntityManagerInterface $entityManager
     * @param BookAudioRepository $audioRepository
     */
    public function __construct(EntityManagerInterface $entityManager, BookAudioRepository $audioRepository)
    {
        $this->entityManager = $entityManager;
        $this->audioRepository = $audioRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::check())
            return redirect()->to('/user/'.\Auth::user()->getAccount());
        else
            return redirect()->to('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * User's page
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id, Request $request)
    {
        if (Cache::has("user_{$id}")) {
            $follows = Cache::get("user_{$id}");
        } else {
            $steem   = new SteemAPI();
            $follows = $follows = $steem->getAccount()->followCount($id);

            Cache::put("user_{$id}", $follows, config('cache.expire'));
        }

        /** @var UserRepository $repo */
        $repo = $this->entityManager->getRepository(User::class);
        $user = $repo->findProfileByAccount($id);

        if(is_null($user))
        {
            abort(404);
        }

        $feed = $this->audioRepository->getUserFeed($request, $id);
        dd($feed);

        return view('profile', [
            'user'         => $user[0],
            'follows'      => $follows,
            'feed'         => $feed->getCollection(),
            'pagination'   => $feed->appends($request->except('page')),
            'contribution' => $user['contribution']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
