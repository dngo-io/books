<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use App\Entities\BookAudio;
use App\Http\Requests\StoreBookAudio;
use App\Service\Mp3Service;
use App\Support\AppController;
use Auth;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;
use EntityManager;
use Illuminate\Http\Request;
use Storage;

class AudioController extends AppController
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {

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
        return view('post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookAudio|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookAudio $request)
    {

        $bookRepository = $this->entityManager->getRepository(Book::class);

        /** @var Book $book */
        $book = $bookRepository->find($request->request->get('book'));

        $user = Auth::user();

//        dd($request->all());

        //upload file here
//        $file = $request->file('audio');
//        dd($file);
//
//        $fileName = sprintf('%s_%s_%s.$s',$book->getId(),$user->getId(),time(),$file->extension());
//        $filePath = sprintf('/%s/%s',$book->getId(),$fileName);
//        $s3 = Storage::disk('s3');
//        $s3->put($filePath, file_get_contents($file), 'public');

        $audio = new BookAudio();
        $audio->setUser($user);
        $audio->setBook($book);
        $audio->setName($request->request->get('title'));
        $audio->setLanguage($request->request->get('language'));
        $audio->setBody($request->request->get('content'));
        $audio->setFileSource('');

        //set duration
//        $mp3service = new Mp3Service($file);
//        $metaData = $mp3service->get_metadata();
//        $length = $metaData['Length mm:ss'];
//
//        $audio->setLength((new Carbon($length))->second);

        $this->entityManager->persist($audio);
        $this->entityManager->flush();

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
