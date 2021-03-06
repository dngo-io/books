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
     * @var array
     */
    private $remoteData = [];

    /**
     * @var string
     */
    private $partial = 'feed';

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
     * User List
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function user_list(Request $request)
    {
        /** @var UserRepository $userRepository */
        $userRepository = $this->entityManager->getRepository(User::class);

        $search = $request->get('account') ? $request->get('account') : '';

        $users  = $userRepository->userList($search);

        return view('users',
            [
                'paginate'   => $users->appends($request->except('page')),
                'users'      => $users->getCollection(),
                'total'      => $users->total(),
                'search'     => $search,
            ]
        );
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
     * User's profile
     *
     * @param string  $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function show(string $id, Request $request)
    {
        if (Cache::has("user_bar_{$id}")) {
            $user_bar = Cache::get("user_bar_{$id}");
        } else {
            $steem = new SteemAPI();
            $user_bar  = [
                'follows' => $steem->getAccount()->followCount($id),
                'user'    => array_get($steem->getAccount()->accounts([$id]), 0),
            ];

            Cache::put("user_bar_{$id}", $user_bar, config('cache.expire'));
        }

        /** @var UserRepository $repo */
        $repo = $this->entityManager->getRepository(User::class);
        $user = $repo->findProfileByAccount($id);

        if(is_null($user[0]))
        {
            abort(404);
        }

        switch ($this->partial)
        {
            case 'feed':
                $title = "{$user[0]->getAccount()} - Feed";
                break;
            case 'pending-approval':
                $title = "{$user[0]->getAccount()} - Pending Approval";
                $request->request->set('status', BookAudioRepository::STATUS_PENDING);
                break;
            case 'rejected':
                $title = "{$user[0]->getAccount()} - Rejected";
                $request->request->set('status', BookAudioRepository::STATUS_REJECTED);
                break;
            case 'followers':
                $title = "{$user[0]->getAccount()} - Followers";
                break;
            case 'following':
                $title = "{$user[0]->getAccount()} - Following";
                break;
            default:
                $title = $user[0]->getAccount();
                break;
        }

        $feed = $this->audioRepository->getUserFeed($request, $id);

        return view('profile', [
            'user'         => $user[0],
            'steem_data'   => $this->remoteData,
            'user_bar'     => $user_bar,
            'feed'         => $feed->getCollection(),
            'pagination'   => $feed->appends($request->except('page')),
            'contribution' => $user['contribution'],
            'partial'      => $this->partial,
            'title'        => $title
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

    /**
     * Display pending approvals on feed
     *
     * @param string $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function pendingApproval(string $id, Request $request)
    {
        $this->partial = 'pending-approval';
        return $this->show($id, $request);
    }

    /**
     * Display pending approvals on feed
     *
     * @param string $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function rejected(string $id, Request $request)
    {
        $this->partial = 'rejected';
        return $this->show($id, $request);
    }

    /**
     * Display following
     *
     * @param string $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function following(string $id, Request $request)
    {
        if (Cache::has("user_following_{$id}")) {
            $this->remoteData = Cache::get("user_following_{$id}");
        } else {
            $steem = new SteemAPI();
            $this->remoteData  = $steem->getAccount()->following($id,'','blog',50);

            Cache::put("user_following_{$id}", $this->remoteData, config('cache.expire'));
        }
        $this->partial = 'following';
        return $this->show($id, $request);
    }

    /**
     * Display followers
     *
     * @param string $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function followers(string $id, Request $request)
    {
        if (Cache::has("user_followers_{$id}")) {
            $this->remoteData = Cache::get("user_followers_{$id}");
        } else {
            $steem = new SteemAPI();
            $this->remoteData  = $steem->getAccount()->followers($id,'','blog',50);

            Cache::put("user_followers_{$id}", $this->remoteData, config('cache.expire'));
        }

        $this->partial = 'followers';
        return $this->show($id, $request);
    }
}
