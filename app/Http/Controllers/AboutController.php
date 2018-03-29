<?php

namespace App\Http\Controllers;

use App\Support\AppController;
use App\Repositories\UserRepository;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use SteemAPI\SteemAPI;

class AboutController extends AppController
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var array
     */
    private $founders = [
        'bencagri'      => 'Founder',
        'ikidnapmyself' => 'Founder',
        'meskoze'       => 'Founder',
        'tubi'          => 'Founder',
        'omeratagun'    => 'Supervisor'
    ];

    /**
     * AboutController constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * About page
     *
     * @param UserRepository $userRepository
     * @param SteemAPI $steemAPI
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function index(UserRepository $userRepository, SteemAPI $steemAPI)
    {

        if (Cache::has('about')) {
            $about = Cache::get('about');
        } else {
            $about = [];
            $bot   = $this->client->get("https://steemit.com/@".config('steem.bot').".json")->getBody()->getContents();
            $bot   = json_decode($bot, true);
            $users = [
                (int) array_get($userRepository->countAccounts(), 1, 0),
                $steemAPI->getAccount()->accountCount()
            ];

            $about['bot']   = array_get($bot, 'user');
            $about['users'] = [
                'local' => $users[0],
                'steem' => $users[1],
                'ratio' => round(($users[0] / $users[1]), 3).'%',
            ];

            foreach ($this->founders as $key => $founder)
            {
                $account = $this->client->get("https://steemit.com/@{$key}.json")->getBody()->getContents();
                $account = json_decode($account, true);
                $about['founders'][$key] = [
                    'position'   => $founder,
                    'name'       => array_get($account, 'user.name'),
                    'reputation' => array_get($account, 'user.reputation'),
                    'created'    => array_get($account, 'user.created'),
                    'picture'    => array_get($account, 'user.json_metadata.profile.profile_image', 'assets/custom/img/profile-picture.jpg'),
                    'about'      => array_get($account, 'user.json_metadata.profile.about', '-'),
                    'location'   => array_get($account, 'user.json_metadata.profile.location', '-'),
                ];
            }
            Cache::put('about', $about, config('cache.expire'));
        }

        return view('about', ['about' => $about]);
    }
}
