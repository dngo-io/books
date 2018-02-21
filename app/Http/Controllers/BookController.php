<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use App\Entities\Category;
use App\Entities\Post;
use App\Entities\User;
use App\Support\AppController;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use EntityManager;
use Illuminate\Http\Request;

class BookController extends AppController
{
    public function index()
    {
        //test create a book


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
        $book->setYear(new Carbon('2014'));
        $book->setReleaseDate(new Carbon('2014-01-19'));
        $book->setCover('https://about.canva.com/wp-content/uploads/sites/3/2015/01/business_bookcover.png');

        $categories = new ArrayCollection();
        $categories->add($categoryRepository->findBySlug('action'));
        $categories->add($categoryRepository->findBySlug('western'));

        //add cateogires
        $post->setCategories($categories);

        $post->setTitle('my test post');
        $post->setUser($user);
        $post->setCreatedAt(new Carbon());
        $post->setUpdatedAt(new Carbon());
        $book->setPost($post);


        EntityManager::persist($book);
        EntityManager::flush();

    }
}
