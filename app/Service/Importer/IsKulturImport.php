<?php


namespace App\Service\Importer;


use App\Entities\Author;
use App\Entities\Book;
use App\Entities\Crawler;
use App\Entities\Post;
use App\Entities\User;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use Carbon\Carbon;
use DiDom\Document;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Somnambulist\EntityValidation\Factories\EntityValidationFactory;

class IsKulturImport
{

    private $baseUrl;

    /**
     * @var array
     */
    private $scannedUrls = [];


    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var AuthorRepository
     */
    private $authorRepository;
    /**
     * @var BookRepository
     */
    private $bookRepository;
    /**
     * @var EntityValidationFactory
     */
    private $entityValidationFactory;

    public function __construct(
        EntityManager $entityManager,
        AuthorRepository $authorRepository,
        BookRepository $bookRepository,
        EntityValidationFactory $entityValidationFactory
    )
    {
        $this->entityManager = $entityManager;
        $this->authorRepository = $authorRepository;
        $this->bookRepository = $bookRepository;
        $this->entityValidationFactory = $entityValidationFactory;
    }


    public function scanAndImport()
    {
        /** @var User $user */
        $user = $this->entityManager->getRepository(User::class)->findOneBy(["account" => "dngotester"]);

        if(!$user){
            throw  new EntityNotFoundException("system user not found. run php artisan dngo:create:testuser");
        }

        for($i = 0; $i <= 8; $i++) {
            $baseUrl = "https://www.iskultur.com.tr/kitap/100-temel-eser/sayfa/" . $i;

            $document = new Document($baseUrl,true);
            $urls = $document->find(".productList");

            //each book
            foreach ($urls as $url) {
                $bookUrl = $url->find("a::attr(href)");
                $bookInfo = new Document($bookUrl[0],true);

                //set specs
                $specs = $this->specs($bookInfo);

                $book = new Book();
                $post = new Post();
                // set author
                $author = $bookInfo->find('span[itemprop="author"]');
                if(isset($author[0])){
                    $book->setAuthor($this->setAuthorFromSource($author[0]->text()));
                }

                //set title
                $title = $bookInfo->find('h1[itemprop="name"]');
                $bookName = str_replace("– Kısaltılmış Metin","",$title[0]->text());
                $book->setName($bookName);
                $post->setTitle($bookName);

                //set description
                $desc = $bookInfo->find("td.colorLac");
                $book->setDescription($desc[0]->innerHtml());

                //set cover
                $cover = $bookInfo->find('img[itemprop="image"]');
                $book->setCover($cover[0]->attr("src"));
                $book->setGutenbergFiles([]);
                //set page
                if (isset($specs["Sayfa Sayısı"])) {
                    $book->setPage($specs["Sayfa Sayısı"]);
                }

                //set isbn
                if (isset($specs["ISBN"])) {
                    $book->setIsbn($specs["ISBN"]);
                }

                //set year
                if (isset($specs["Yılı"])) {
                    $book->setYear($specs["Yılı"]);
                    $book->setReleaseDate(new Carbon($specs["Yılı"]));
                }

                $book->setCollection("İş Bankası Kültür Yayınları");

                $post->setUser($user);
                $book->setPost($post);

                $this->entityManager->persist($book);
                $this->entityManager->flush();

            }
        }

    }

    public function specs(Document $book)
    {
        $rows =  $book->find('td[width="150"]');

        $data = [];
        foreach ($rows as $row) {
            $last = $row->parent()->find("td");

            $data[$row->text()] = $last[2]->text();
        }

        return $data;
    }

    public function setAuthorFromSource($name)
    {
        $author = $this->authorRepository->findOneBy(['name' => $name]);

        if (!$author) {
            $author = new Author();
            $author->setName($name);
        }

        return $author;
    }
}