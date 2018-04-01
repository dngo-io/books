<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use App\Entities\BookAudio;
use App\Entities\User;
use App\Repositories\BookRepository;
use App\Repositories\UserRepository;
use App\Support\AppController;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use Steem\Steemit;


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
        if(is_array($bookAudio->getTags()))
            $result = select2fy($bookAudio->getTags());
        else
            $result = [];

        return response($result);
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

    /**
     * Upvote a content
     *
     * @param string  $author   Owner of the post, you will be upvoted
     * @param string  $permlink Post permalink to identify the post
     * @param int     $weight   Weight of upvote, up to 100%
     * @param Steemit $steem    Steem Connect v2 API wrapper to proceed upvote operation
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function upvote(string $author, string $permlink, int $weight, Steemit $steem)
    {
        if(\Auth::check())
        {
            $user    = \Auth::user();
            $account = $user->getAccount();
            $token   = $user->getAccessToken();

            $upvote = $steem->setToken($token)->exec(
                'vote',
                [
                    $account,
                    $author,
                    $permlink,
                    $weight * 100
                ]
            );

            $response = [
                'success' => true,
                'data'    => $upvote,
            ];
        } else {
            $response = [
                'success' => false,
                'data'    => [],
            ];
        }

        return response($response);
    }
}
