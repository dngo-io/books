<?php

namespace App\Http\Controllers\Staff;

use App\Repositories\BookAudioRepository;
use App\Support\AppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ModeratorController extends AppController
{

    /**
     * @var BookAudioRepository
     */
    private $audioRepository;

    public function __construct(BookAudioRepository $audioRepository)
    {
        if (Auth::user() && !Auth::user()->checkRole('moderator')) {
            abort(404);
        }

        $this->audioRepository = $audioRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $results = $this->audioRepository->searchByRequest($request);

        dd($results);

        return view('moderation', [
            'users' => [
                'ikidnapmyself',
                'tubi',
                'maskoze',
                'bencagri'
            ],
            'colors' => [
                'success',
                'dark',
                'danger',
                'warning'
            ],
            'content' => $results->getCollection(),
            'paginate'   => $results->appends($request->except('page')),
        ]);
    }
}