<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use App\Entities\BookAudio;
use App\Entities\User;
use App\Repositories\BookAudioRepository;
use App\Repositories\BookRepository;
use App\Repositories\UserRepository;
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

    public function audioTags(BookAudio $bookAudio)
    {
        response($bookAudio->getTags());
    }

    public function topbar(Request $request)
    {
        /** @var BookRepository $repository */
        $repository = $this->entityManager->getRepository(Book::class);

        $books = [];

        foreach ($repository->findByName($request->get('query'), 5) as $book)
        {
            $books[] = [
                'id'   => $book->getId(),
                'name' => $book->getName(),
            ];
        }

        /** @var UserRepository $repository */
        $repository = $this->entityManager->getRepository(User::class);

        $users =  $repository->findByAccount($request->get('query'), 5);

        return view('layout.partials.header.topbar-results', [
            'books' => $books,
            'users' => $users,
        ]);
    }
}
