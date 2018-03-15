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
        $filters = $request->all();

        if(!isset($filters['status']))
        {
            $filters['status'] = ['pending'];
        }
        if(!isset($filters['order_by']))
        {
            $filters['order_by'] = 'date';
        }

        return view('moderation', [
            'status' => [
                0 => ['color' =>'warning', 'text' => 'Pending Approval'],
                1 => ['color' =>'success', 'text' => 'Approved'],
                2 => ['color' =>'danger',  'text' => 'Rejected'],
                3 => ['color' =>'dark',    'text' => 'No Contribution'],
            ],
            'filters'  => $filters,
            'count'    => $results->count(),
            'content'  => $results->getCollection(),
            'paginate' => $results->appends($request->except('page')),
        ]);
    }
}