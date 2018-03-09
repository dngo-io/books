<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use App\Entities\Category;
use App\Repositories\BookRepository;
use App\Service\BookService;
use App\Support\AppController;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class BooksController extends AppController
{
    /**
     * @var BookService
     */
    private $bookService;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(BookService $bookService, EntityManagerInterface $entityManager)
    {
        $this->bookService = $bookService;
        $this->entityManager = $entityManager;
    }

    public function index(Request $request)
    {
        $categories = $this->entityManager->getRepository(Category::class)->findAll();

        /** @var BookRepository $bookRepository */
        $bookRepository = $this->entityManager->getRepository(Book::class);

        $books = $bookRepository->getSearchResults($request, 9);

        /**
         * Search filters
         */

        $chosen = [
            'name'     => '',
            'category' => [],
            'language' => [],
            'year'     => []
        ];

        if($request->get('name')) {
            $chosen['name'] = $request->get('name');
        }

        if(!$request->get('category')) {
            $chosen['category'] = true;
        } else {
            $chosen['category'] = $request->get('category');
        }

        if(!$request->get('language')) {
            $chosen['language'] = true;
        } else {
            $chosen['language'] = $request->get('language');
        }

        if(!$request->get('language')) {
            $chosen['year'] = [ 1900, 2018 ];
        } else {
            $chosen['year'] = explode(';', $request->get('year'));
        }

        return view('books',
            [
                'categories' => $categories,
                'paginate'   => $books->appends($request->except('page')),
                'books'      => $books->getCollection(),
                'chosen'     => $chosen
            ]
        );

    }
}
