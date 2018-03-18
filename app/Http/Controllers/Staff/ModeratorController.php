<?php

namespace App\Http\Controllers\Staff;

use App\Entities\BookAudio;
use App\Events\AudioApproved;
use App\Repositories\BookAudioRepository;
use App\Support\AppController;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;


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

    public function __construct(EntityManagerInterface $entityManager,BookAudioRepository $audioRepository)
    {
        $this->audioRepository = $audioRepository;
        $this->entityManager = $entityManager;
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

    public function action($id,$status)
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
            $bookAudio->setStatus($status);
        }

        try  {
            /** @var BookAudio $bookAudio */
            $bookAudio = $this->audioRepository->find($id);
            $bookAudio->activate();
            $bookAudio->setStatus($status);
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
}