<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Support\AppController;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\SteemService;
use SteemAPI\SteemAPI;
use Illuminate\Support\Facades\Cache;


class UserController extends AppController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var SteemService
     */
    private $steem;

    /**
     * UserController constructor.
     * @param EntityManagerInterface $entityManager
     * @param SteemService $steem
     */
    public function __construct(EntityManagerInterface $entityManager, SteemService $steem)
    {
        $this->entityManager = $entityManager;
        $this->steem         = $steem;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Cache::has("user_{$id}")) {
            $follows = Cache::get("user_{$id}");
        } else {
            $steem   = new SteemAPI();
            $follows = $steem->exec('followCount', [$id]);

            Cache::put("user_{$id}", $follows, config('cache.expire'));
        }

        $repo = $this->entityManager->getRepository(User::class);
        $user = $repo->findOneByAccount($id);

        if(is_null($user))
        {
            abort(404);
        }

        return view('profile', ['user' => $user, 'follows' => $follows]);
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
