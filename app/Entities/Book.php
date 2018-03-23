<?php


namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Somnambulist\Doctrine\Traits\Identifiable;
use Somnambulist\Doctrine\Traits\Nameable;

class Book
{
    use Nameable;
    use Identifiable;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var Author
     */
    protected $author;

    /**
     * @var string
     */
    protected $isbn;

    /**
     * @var \DateTime
     */
    protected $year;

    /**
     * @var \DateTime
     */
    protected $releaseDate;

    /**
     * @var integer
     */
    protected $page;

    /**
     * @var string
     */
    protected $cover;

    /**
     * @var Post
     */
    protected $post;

    /**
     * @var integer
     */
    protected $gutenbergId;

    /**
     * @var ArrayCollection
     */
    protected $gutenbergFiles;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var string
     */
    protected $rights;

    /**
     * @var string
     */
    protected $licence;

    /**
     * @var string
     */
    protected $categories;

    /** @var  string */
    protected $collection;

    /** @var  string */
    protected $language;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return \DateTime
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param integer $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }


    /**
     * @return Post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param Post $post
     *
     */
    public function setPost(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param \DateTime $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param string $cover
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor(Author $author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return int
     */
    public function getGutenbergId()
    {
        return $this->gutenbergId;
    }

    /**
     * @param int $gutenbergId
     */
    public function setGutenbergId($gutenbergId)
    {
        $this->gutenbergId = $gutenbergId;
    }

    /**
     * @return ArrayCollection
     */
    public function getGutenbergFiles()
    {
        return $this->gutenbergFiles;
    }

    /**
     * @param array $gutenbergFiles
     */
    public function setGutenbergFiles($gutenbergFiles)
    {
        $this->gutenbergFiles = $gutenbergFiles;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getRights()
    {
        return $this->rights;
    }

    /**
     * @param string $rights
     */
    public function setRights($rights)
    {
        $this->rights = $rights;
    }

    /**
     * @return string
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * @param string $licence
     */
    public function setLicence($licence)
    {
        $this->licence = $licence;
    }

    /**
     * @return mixed
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param mixed $collection
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return string
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param string $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

}