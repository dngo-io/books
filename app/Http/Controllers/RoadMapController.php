<?php

namespace App\Http\Controllers;

use App\Support\AppController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class RoadMapController extends AppController
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var array
     */
    private $users = ['bencagri', 'ikidnapmyself', 'meskoze', 'tubi', 'omeratagun'];

    /**
     * AboutController constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        if (Cache::has('road-map')) {
            $map = Cache::get('road-map');
        } else {
            $map = [];
            foreach ($this->users as $user)
            {
                $account = $this->client->get("https://steemit.com/@{$user}.json")->getBody()->getContents();
                $account = json_decode($account, true);
                $map[$user] = [
                    'name'       => array_get($account, 'user.name'),
                    'reputation' => array_get($account, 'user.reputation'),
                    'created'    => array_get($account, 'user.created'),
                    'picture'    => array_get($account, 'user.json_metadata.profile.profile_image', 'assets/custom/img/profile-picture.jpg'),
                    'about'      => array_get($account, 'user.json_metadata.profile.about', '-'),
                    'location'   => array_get($account, 'user.json_metadata.profile.location', '-'),
                ];
            }
            Cache::put('road-map', $map, config('cache.expire'));
        }

        return view('road-map', ['map' => $map]);
    }
}
