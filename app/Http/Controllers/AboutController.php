<?php

namespace App\Http\Controllers;

use App\Support\AppController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class AboutController extends AppController
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var array
     */
    private $founders = ['bencagri', 'ikidnapmyself', 'meskoze', 'tubi'];

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
        if (Cache::has('about')) {
            $about = Cache::get('about');
        } else {
            $about = [];
            $bot   = $this->client->get("https://steemit.com/@".config('steem.bot').".json")->getBody()->getContents();
            $bot   = json_decode($bot, true);

            $about['bot'] = array_get($bot, 'user');

            foreach ($this->founders as $founder)
            {
                $account = $this->client->get("https://steemit.com/@{$founder}.json")->getBody()->getContents();
                $account = json_decode($account, true);
                $about['founders'][$founder] = [
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
