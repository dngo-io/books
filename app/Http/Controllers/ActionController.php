<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use App\Entities\User;
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


        $result = [];
        foreach ($books as $book)
        {
            $result[] = [
                'description'     => $book->getDescription(),
                'author'          => $book->getAuthor()->getName(),
                'isbn'            => $book->getIsbn(),
                'year'            => $book->getYear(),
                'releaseDate'     => $book->getReleaseDate(),
                'page'            => $book->getPage(),
                'cover'           => $book->getCover(),
                'post'            => $book->getPost(),
                'gutenbergId'     => $book->getGutenbergId(),
                'gutenbergFiles'  => $book->getGutenbergFiles(),
                'language'        => config("app.languages.{$book->getLanguage()}"),
                'name'            => $book->getName(),
                'id'              => $book->getId(),
            ];
        }

        return response($result);
    }

    public function topbar(Request $request)
    {
        /** @var BookRepository $repository */
        $repository = $this->entityManager->getRepository(User::class);

        $users =  $repository->findByAccount($request->get('query'));

        dd($users);

        return view('layout.partials.header.topbar-results', [
            'users' => $users,
        ]);
    }
}
