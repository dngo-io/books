<?php

namespace App\Service;


use App\Entities\Book;
use App\Entities\Category;
use App\Entities\Post;
use App\Entities\User;
use App\Http\Requests\StoreBook;
use Auth;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

class BookService
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    public function addBook(StoreBook $request)
    {
        $userRepository = $this->entityManager->getRepository(User::class);
        $categoryRepository = $this->entityManager->getRepository(Category::class);

        /** @var User $user */
        $user = $userRepository->find(Auth::id());

        $post = new Post();
        $book = new Book();

        $book->setName($request->post('name'));
        $book->setIsbn($request->post('isbn'));
        $book->setDescription($request->post('description'));
        $book->setPage($request->post('page'));
        $book->setYear((new Carbon())->year($request->post('year')));
        $book->setReleaseDate(new Carbon($request->post('release_date')));
        $book->setCover($request->post('cover'));

        $categories = new ArrayCollection();

        if (is_array($request->post('categories'))) {
            foreach ($request->post('categories') as $category) {
                $cat = $categoryRepository->findBySlug($category);
                if( $cat ){
                    $categories->add($cat);
                }
            }
        }

        //add categories
        $post->setCategories($categories);

        $post->setTitle('my test post');
        $post->setUser($user);

        if ($request->has('updated_at')) {
            $post->setUpdatedAt(new Carbon($request->post('updated_at')));
        }

        $book->setPost($post);


        $this->entityManager->persist($book);
        $this->entityManager->flush();
    }

}