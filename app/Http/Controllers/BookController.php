<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use App\Entities\Category;
use App\Entities\Post;
use App\Entities\User;
use App\Support\AppController;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Http\Request;
use LaravelDoctrine\ORM\Facades\EntityManager;

class BookController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRepository = EntityManager::getRepository(User::class);
        $categoryRepository = EntityManager::getRepository(Category::class);

        /** @var User $user */
        $user = $userRepository->find(1);

        $post = new Post();
        $book = new Book();

        $book->setName('My Awesome book');
        $book->setIsbn("12312321312");
        $book->setDescription('My Test book');
        $book->setPage(245);
        $book->setYear((new Carbon())->year('2014'));
        $book->setReleaseDate(new Carbon('2014-01-19'));
        $book->setCover('https://about.canva.com/wp-content/uploads/sites/3/2015/01/business_bookcover.png');

        $categories = new ArrayCollection();
        $categories->add($categoryRepository->findBySlug('action'));
        $categories->add($categoryRepository->findBySlug('western'));

        //add cateogires
        $post->setCategories($categories);

        $post->setTitle('my test post');
        $post->setUser($user);
        //$post->setCreatedAt(new Carbon());
//        $post->setUpdatedAt(new Carbon());
        $book->setPost($post);


        EntityManager::persist($book);
        EntityManager::flush();

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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
