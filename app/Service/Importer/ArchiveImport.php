<?php


namespace App\Service\Importer;

use App\Entities\Crawler;
use DiDom\Document;
use Doctrine\ORM\EntityManager;

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

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function scanAndImport()
    {
        $i=0;
        while(1){
            $i++;
            $baseUrl = sprintf("http://archive.org/details/gutenberg?page=%s",$i);
            $document = new Document($baseUrl,true);

            //get url of book
            $urls = $document->find(".item-ttl");
            foreach ($urls as $url) {
                $bookUrl = $url->find("a::attr(href)");
                $bookUrl = $this->parseBaseUrl($this->getBaseUrl()) . $bookUrl[0];

                $crawl = new Crawler();
                $crawl->setUrl($bookUrl);
                $crawl->setIdentifier($this->getIdentifier($bookUrl));

                $this->entityManager->persist($crawl);
                $this->entityManager->flush();

            }

            if($document->has(".no-results")) break;
        }

        // get url's from db and scan
        // update status on db.
        // crawler.identifier should be  book.isbn (uniq)
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
}