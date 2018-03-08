<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use App\Entities\BookAudio;
use App\Entities\Category;
use App\Entities\Post;
use App\Entities\User;
use App\Events\StatsEvent;
use App\Http\Requests\StoreBook;
use App\Service\BookService;
use App\Support\AppController;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use LaravelDoctrine\ORM\Facades\EntityManager;

class BookController extends AppController
{

    /**
     * @var BookService
     */
    private $bookService;

    public function __construct(BookService $bookService)
    {

        $this->bookService = $bookService;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('book',['id' => $id]);
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
