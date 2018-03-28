<?php

namespace App\Http\Controllers\Staff;

use App\Entities\BookAudio;
use App\Entities\SteemLogs;
use App\Events\AudioApproved;
use App\Repositories\BookAudioRepository;
use App\Support\AppController;
use App\Service\BookAudioService;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class ModeratorController extends AppController
{

    /**
     * @var BookAudioRepository
     */
    private $audioRepository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var BookAudioService
     */
    private $bookAudioService;

    public function __construct(EntityManagerInterface $entityManager, BookAudioRepository $audioRepository, BookAudioService $bookAudioService)
    {
        $this->audioRepository  = $audioRepository;
        $this->entityManager    = $entityManager;
        $this->bookAudioService = $bookAudioService;
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

    /**
     * @param $id
     * @param $status
     * @param Request $request
     * @return array
     */
    public function action($id,$status, Request $request)
    {
        $statusList = BookAudioRepository::AUDIO_STATUS;

        if (!isset($statusList[$status])) {
            return  [
                'status' => false,
                'message' => "Status is incorrect"
            ];
        }
        /** @var BookAudio $bookAudio */
        $bookAudio = $this->audioRepository->find($id);
        if($status == BookAudioRepository::STATUS_APPROVED ) {
            $bookAudio->activate();
        }


        try  {
            /** @var BookAudio $bookAudio */
            $bookAudio = $this->audioRepository->find($id);
            $bookAudio->activate();
            $bookAudio->setStatus($status);
            $bookAudio->setModComment($request->get('comment'));
            $this->entityManager->persist($bookAudio);
            $this->entityManager->flush();

            //fire event
            event(new AudioApproved($bookAudio));

            return  [
                'status' => true,
                'message' => 'Updated',
                'content' => $bookAudio
            ];
        }catch (\Exception $e) {
            return  [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }

    }

    /**
     * Retrieve book audio for modal box as JSON
     *
     * @param int $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function modal($id)
    {
        $bookAudio = $this->bookAudioService->find($id);

        if(is_null($bookAudio) || $bookAudio['audio']['status'] != BookAudioRepository::STATUS_PENDING)
            $response = [
                'success' => false,
                'message' => 'No matching record found'
            ];
        else
            $response = [
                'success' => true,
                'csrf'    => csrf_token(),
                'data'    => $bookAudio
            ];

        return response($response);
    }

    public function steemLogs(Request $request)
    {

        /** @var LengthAwarePaginator $logs */
        $logs = $this->entityManager->getRepository(SteemLogs::class)->findApprovedAudios($request);
//        dd($logs);
        return view('moderation-logs',
            [
                'paginate'   => $logs->appends($request->except('page')),
                'content'    => $logs->getCollection(),
                'total'      => $logs->total(),
                'count'      => $logs->count(),
            ]
        );
    }
}
