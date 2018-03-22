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
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Support\Facades\Log;
use Somnambulist\EntityValidation\Factories\EntityValidationFactory;

class ArchiveImport
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

    /**
     * @param int $limit
     * @throws EntityNotFoundException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function scanAndImport($limit = 0)
    {
        /** @var User $user */
        $user = $this->entityManager->getRepository(User::class)->findOneBy(["account" => "dngotester"]);

        if(!$user){
            throw  new EntityNotFoundException("system user not found. run php artisan dngo:create:testuser");
        }

        $crawlerRepository = $this->entityManager->getRepository(Crawler::class);
        $lim = 0;
        $i = 0;
        while(1){
            $i++;
            $baseUrl = sprintf("%s?page=%s",$this->getBaseUrl(),$i);
            $document = new Document($baseUrl,true);

            //get url of book
            $urls = $document->find(".item-ttl");
            foreach ($urls as $url) {
                $bookUrl = $url->find("a::attr(href)");
                $bookUrl = $this->parseBaseUrl($this->getBaseUrl()) . $bookUrl[0];

                $identifier = $this->getIdentifier($bookUrl);

                $find = $crawlerRepository->findBy(['identifier' => $identifier]);

                if (!$find)
                {
                    $crawl = new Crawler();
                    $crawl->setUrl($bookUrl);
                    $crawl->setIdentifier($identifier);

                    $this->entityManager->persist($crawl);
                    $this->entityManager->flush();
                    $lim++;
                }

            }

            if($document->has(".no-results")) break;
            if($limit !== 0 && $lim <= $limit) break;

        }

        // get url's from db and scan
        // update status on db.
        // crawler.identifier should be  book.isbn (uniq)
        $urls = $crawlerRepository->findBy(["status" => Crawler::STATUS_SCANNED]);

        /** @var Crawler $crawl */
        foreach ($urls as $crawl) {
            $url = sprintf("%s?output=json",$crawl->getUrl());
            $payload = file_get_contents($url);

            $payload = json_decode($payload, true);

            if (! $this->bookRepository->findOneBy(['isbn' => $crawl->getIdentifier()])) {
                //create book
                $book = new Book();
                $post = new Post();
                $post->setUser($user);

                //add title
                if ($value = $this->checkDataAgainstPayload($payload, 'title')) {
                    $value = str_limit($value,255,'');
                    $book->setName($value);
                    $post->setTitle($value);
                }

                //add description
                if ($value = $this->checkDataAgainstPayload($payload, 'description')) {
                    $book->setDescription($value);
                }

                //add contributor
                if ($value = $this->checkDataAgainstPayload($payload, 'contributor')) {
                    $book->setCollection($value);
                }

                //add language
                if ($value = $this->checkDataAgainstPayload($payload, 'language')) {
                    $language = substr($value, 0, 2);
                    $book->setLanguage($language);
                }

                //add licence
                if ($value = $this->checkDataAgainstPayload($payload, 'licenseurl')) {
                    $book->setLicence($value);
                }

                //add rights
                if ($value = $this->checkDataAgainstPayload($payload, 'rights')) {
                    $book->setRights($value);
                }

                //add source
                if ($value = $this->checkDataAgainstPayload($payload, 'source')) {
                    $book->setSource($value);
                }

                //add author
                if ($value = $this->checkDataAgainstPayload($payload, 'creator')) {
                    $book->setAuthor($this->setAuthorFromSource($value));
                }

                //add release date
                if ($value = $this->checkDataAgainstPayload($payload, 'publicdate')) {
                    $book->setReleaseDate(new Carbon($value));
                }

                //add files
                if ($value = $this->setFilesFromSource($payload, $crawl->getUrl())) {

                    $book->setGutenbergFiles($value);
                }

                //add cover
                if (NULL !== $payload["misc"]["image"]) {
                    $book->setCover($payload["misc"]["image"]);
                }

                //add categories
                if ($value = $this->checkDataAgainstPayload($payload, 'subject')) {
                    $book->setCategories($value);
                }

                //add isbn
                if ($value = $this->checkDataAgainstPayload($payload, 'identifier')) {
                    $book->setIsbn($value);
                }

                $book->setPost($post);

                if ($this->entityValidationFactory->validate($book)) {
                    $this->entityManager->persist($book);
                    $this->entityManager->flush();
                }else{
                    Log::debug($book->getName() . ' -Valid Değil');
                }
            }else{
                $crawl->setStatus(Crawler::STATUS_ALREADY_IMPORTED);
                $this->entityManager->persist($crawl);
                $this->entityManager->flush();
            }

        }
    }

    /**
     * @param $payload
     * @param $data
     * @param string $column
     * @return bool
     */
    public function checkDataAgainstPayload($payload,$data, $column = 'metadata')
    {
        if (isset($payload[$column][$data]) && NULL !== $payload[$column][$data]) {
            return $payload[$column][$data][0];
        }

        return false;
    }

    /**
     * @param $name
     * @return Author
     */
    public function setAuthorFromSource($name)
    {
        $name = preg_replace("/[0-9,-]+/","",$name);
        /** @var Author $author */
        $author = $this->authorRepository->findOneBy(['name' => $name]);

        if (!$author) {
            $author = new Author();
            $author->setName($name);
        }

        return $author;

    }

    public function setFilesFromSource($payload,$bookSourceUrl)
    {
        $files = [];

        foreach ($payload['files'] as $name => $file) {
            $downloadUrl = $bookSourceUrl.$name;
            $format = strtolower($file['format']);
            $files[][$format] = $downloadUrl;
        }

        return $files;
    }

    /**
     * @param $identifier
     * @return mixed
     */
    protected function getIdentifier($identifier){
        $identifier = explode("/",$identifier);
        return end($identifier);
    }

    /**
     * @param $url
     * @return string
     */
    protected function parseBaseUrl($url)
    {
        $url = parse_url($url);
        return $url['scheme'] ."://".$url["host"];
    }


    public function getBaseUrl() {
        return $this->baseUrl;
    }

    public function setBaseUrl($url)
    {
        $this->baseUrl = $url;
    }

    public function validateBook()
    {
        
    }
}