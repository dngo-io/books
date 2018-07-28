<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use App\Http\Requests\StoreBook;
use App\Service\BookService;
use App\Support\AppController;
use App\Repositories\BookAudioRepository;
use Doctrine\ORM\EntityManager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends AppController
{
    /**
     * @var BookService
     */
    private $bookService;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * BookController constructor
     *
     * @param BookService $bookService
     * @param EntityManager $entityManager
     */
    public function __construct(BookService $bookService, EntityManager $entityManager)
    {
        $this->bookService = $bookService;
        $this->entityManager = $entityManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book');
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
     * @param StoreBook|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBook $request)
    {

        try {
            $this->bookService->addBook($request);
            $response['success'] = true;
        }catch (\Exception $e) {
            $response['success'] = false;
            $response['message'] = $e->getMessage();
        }

        return new Response($response);

    }

    /**
     * Display the specified resource
     *
     * @param $id
     * @param BookAudioRepository $audioRepository
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id, BookAudioRepository $audioRepository, Request $request)
    {
        /** @var Book $book */
        $book = $this->bookService->getBook($id);
        if ($book)
        {
            $request->request->set('book', $id);

            $feed = $audioRepository->getUserFeed($request, null, 5);

            return view('book',[
                'book'       => $book,
                'count'      => $feed->count(),
                'total'      => $feed->total(),
                'content'    => $feed->getCollection(),
                'pagination' => $feed->appends($request->except('page'))
            ]);
        }

        return abort(404);
    }

    /**
     * @param int $id
     */
    public function image(int $id)
    {
        $config = file_get_contents(resource_path('assets/covers/config.json'));
        $config = json_decode($config, true);

        /** @var Book $book */
        $book   = $this->entityManager->getRepository(Book::class)->find($id);
        $rand   = ($id % 9) + 1;

        if (!$book) {
            abort(404);
        }

        $config[$rand]['text1']['font-type']       = resource_path('assets/covers/'.$config[$rand]['text1']['font-type']);
        $config[$rand]['text2']['font-type']       = resource_path('assets/covers/'.$config[$rand]['text2']['font-type']);
        $config[$rand]['config']['background-url'] = resource_path('assets/covers/'.$config[$rand]['config']['background-url']);

        $book_name   = iconv ( 'UTF-8', 'ISO-8859-1//TRANSLIT', $book->getName());
        $author_name = iconv ( 'UTF-8', 'ISO-8859-1//TRANSLIT', $book->getAuthor()->getName());

        try {
            $generator = new \DngoIO\CoverCreator\Generator();
            $generator->setConfig($config[$rand]['config']); //or new Generator($config)
            $generator->addLine($book_name, $config[$rand]['text1']);
            $generator->addLine($author_name, $config[$rand]['text2']);
            $generator->generate();
        }catch (\Exception $e) {
            echo $e->getMessage();
        }

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
}
