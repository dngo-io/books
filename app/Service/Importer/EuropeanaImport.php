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
use Illuminate\Support\Facades\Storage;
use Somnambulist\EntityValidation\Factories\EntityValidationFactory;

class EuropeanaImport
{

    const SITE_URL = "https://www.europeana.eu";

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

    public function scan($limit, int $rememberPage = 0)
    {

        $crawlerRepository = $this->entityManager->getRepository(Crawler::class);

        if ($rememberPage){
            $lastPage = null;
            if(file_exists(base_path("storage/logs/europeana.log"))) {
                $lastPage = file_get_contents(base_path("storage/logs/europeana.log"));
            }

            $i = $lastPage;
        }else{
            $i = 0;
        }

        $lim = 0;


        while(1) {
            $i++;

            file_put_contents(base_path("storage/logs/europeana.log"), $i);

            $baseUrl = sprintf("%s&page=%s",$this->getBaseUrl(),$i);

            echo ">> Scanning " . $baseUrl ."\n";

            $document = new Document($baseUrl,true);

            //get url of book
            $urls = $document->find('.result-items')[0]->find("h2");

            foreach ($urls as $url) {
                $bookUrl = $url->find("a::attr(href)")[0];
                $bookUrl = $this->getBookUrl($bookUrl);

                echo '>> Book Url ' . $bookUrl . "\n";
                $identifier = $this->getIdentifier($bookUrl);

                $find = $crawlerRepository->findBy(['identifier' => $identifier, 'source' => 'europeana']);

                if (!$find)
                {
                    $crawl = new Crawler();
                    $crawl->setUrl($bookUrl);
                    $crawl->setIdentifier($identifier);
                    $crawl->setSource('europeana');

                    $this->entityManager->persist($crawl);
                    $this->entityManager->flush();
                    $lim++;
                }

            }

            if (!$document->has(".is-vishidden")) {
                break;
            }
            if($limit !== 0 && $lim <= $limit) break;

        }
    }

    /**
     * @throws EntityNotFoundException
     */
    public function import()
    {

        $crawlerRepository = $this->entityManager->getRepository(Crawler::class);

        /** @var User $user */
        $user = $this->entityManager->getRepository(User::class)->findOneBy(["account" => "dngotester"]);

        if(!$user){
            throw  new EntityNotFoundException("system user not found. run php artisan dngo:create:testuser");
        }

        // get url's from db and scan
        // update status on db.
        // crawler.identifier should be  book.isbn (uniq)
        $urls = $crawlerRepository->findBy(["status" => Crawler::STATUS_SCANNED, 'source' => 'europeana']);

        /** @var Crawler $crawl */
        foreach ($urls as $crawl) {
            $file = [];
            $url = sprintf("%s",$crawl->getUrl());

            try{
                $payload = new Document($url,true);
            } catch (\Exception $e)
            {
                echo "Error: {$e->getMessage()}";
                continue;
            }

            if (! $this->bookRepository->findOneBy(['isbn' => $crawl->getIdentifier()])) {
                //create book
                $book = new Book();
                $post = new Post();
                $post->setUser($user);

                //set title
                $title = trim(substr(trim($payload->find(".object-title")[0]->text()),5,-1));
                $title = str_limit($title,250);
                $book->setName($title);
                $post->setTitle($title);

                //set description
                $descriptionList = $payload->find('*[^data-section-id=description]');
                if ($descriptionList){
                    foreach ($descriptionList as $description) {
                        $description = $description->find(".comma-list > li");
                        $descriptionContent = '';
                        foreach ($description as $item) {
                            $descriptionContent .= $item->text();
                        }
                    }
                    $book->setDescription($descriptionContent);
                }

                //add collection
                if($provider = $this->bringByDataHeader($payload, 'Provider:')){
                    $book->setCollection(trim($provider));
                }

                //add language
                $book->setLanguage("es");

                //add rights
                if($rights = $this->bringByDataHeader($payload, 'Rights:')){
                    $book->setRights(trim($rights));
                }

                //add licence
                $licence = $payload->find(".object-license")[0]->find("a::attr(href)")[0];
                $book->setLicence($licence);


                //add year
                if ($year = $this->bringByDataHeader($payload,'Date:')) {
                    if (preg_match('/\b\d{4}\b/', $year, $matches)) {
                        $year = $matches[0];
                        $book->setYear($year);
                    }
                }

                // add author
                if ($authorName = $this->bringByDataHeader($payload, 'Creator:')) {
                    $author = $this->authorRepository->findOneBy(['name' => $authorName]);
                    if (!$author) {
                        $author = new Author();
                        $author->setName(str_limit($authorName, 250));
                    }

                    $book->setAuthor($author);
                }

                //add release date
                $book->setReleaseDate((new Carbon($book->getYear())));

                //add isbn
                $book->setIsbn($crawl->getIdentifier());

                //add download file
                $format = $payload->find(".tech-meta-format")[0]->nextSibling(".val")->text();
                $format = explode('/',$format);
                $format = $format[1];
                $downloadUrl = $payload->find(".download-button")[0]->attr("href");

                $file[][$format] = $downloadUrl;
                $book->setGutenbergFiles($file);

                $book->setPost($post);

                //workaround
                $book->setPriority(9999);

                if ($this->entityValidationFactory->validate($book)) {
                    $this->entityManager->persist($book);
                    $this->entityManager->flush();

                    echo '>>> imported ' . $book->getName();

                }else{
                    echo '>>> non valid ' . $book->getName();
                    Log::debug($book->getName() . ' -Valid Değil');
                }

            }else{
                $crawl->setStatus(Crawler::STATUS_ALREADY_IMPORTED);
                $this->entityManager->persist($crawl);
                $this->entityManager->flush();

                echo '>>> already imported ' . $crawl->getIdentifier();
            }

            echo "\n";

        }
    }


    public function bringByDataHeader($payload,$equal)
    {
        $collection = $payload->find(".data-header");

        if($collection) {
            foreach ($collection as $item) {
                if ($item->text() === $equal) {
                    $provider = $item->nextSibling(".comma-list > li")->text();
                    return $provider;
                    break;
                }
            }
        }

        return null;

    }


    public function getBookUrl($bookUrl)
    {
        $bookUrl = explode("/",$bookUrl);
        $params = explode('.html',end($bookUrl));
        unset($params[1]);
        $bookUrl[5] = $params[0];

        $bookUrl = implode('/',$bookUrl);

        return self::SITE_URL . $bookUrl;
    }

    /**
     * @param $identifier
     * @return mixed
     */
    protected function getIdentifier($identifier){
        $identifier = explode("/",$identifier);
        $identifier = explode('.html',end($identifier));
        $identifier = str_replace('_',':',$identifier);
        return $identifier[0];
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

}