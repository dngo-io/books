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

        $books = $bookRepository->getSearchresults($request, 9);

        return view('books',
            [
                'categories' => $categories,
                'obj' => $books,
                'books' => $books->getCollection()
            ]
        );

    }
}
