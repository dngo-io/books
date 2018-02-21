<?php


namespace App\Entities;

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
     * @param \DateTime $year
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

}