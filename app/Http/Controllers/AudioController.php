<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use App\Http\Requests\StoreBookAudio;
use App\Repositories\BookRepository;
use App\Service\BookAudioService;
use App\Support\AppController;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Flysystem\Exception;

class AudioController extends AppController
{

    /**
     * @var BookAudioService
     */
    private $bookAudioService;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(BookAudioService $bookAudioService, EntityManagerInterface $entityManager)
    {
        $this->bookAudioService = $bookAudioService;
        $this->entityManager = $entityManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        dd('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chosenBook = old('book');
        $chosenTags = old('tags');
        $tags       = [];
        $book       = null;
        if(!empty($chosenBook))
        {
            /** @var BookRepository $bookRepository */
            $bookRepository = $this->entityManager->getRepository(Book::class);

            $getBook = $bookRepository->findOneBy(['id' => $chosenBook]);
            $book    = [
                'id'   => $chosenBook,
                'text' => $getBook->getName().' - '.$getBook->getAuthor()->getName()
            ];
        }

        if(!empty($chosenTags))
        {
            $tags    = $chosenTags;
        }

        return view('audio-create', ['book' => $book, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookAudio|Request $request
     * @return array
     */
    public function store(StoreBookAudio $request)
    {
        /**
         * Required for slow uploaders. There is no elegant way to solve.
         * 3 Minutes
         */
        ini_set('max_execution_time', 180);

        try {
            $this->bookAudioService->addAudio($request);
            $response = [
                'success' => true
            ];

        }catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        dd($id);
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
        dd($id);
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
