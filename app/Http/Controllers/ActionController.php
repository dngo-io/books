<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use App\Repositories\BookRepository;
use App\Support\AppController;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;


class ActionController extends AppController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    public function book(Request $request)
    {
        /** @var BookRepository $repository */
        $repository = $this->entityManager->getRepository(Book::class);

        $books =  $repository->findByName($request->get('name'));

        return response($books);
    }

}
