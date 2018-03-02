<?php

namespace App\Entities;


use Carbon\Carbon;
use Somnambulist\Doctrine\Traits\Identifiable;
use Somnambulist\Doctrine\Traits\Nameable;
use Somnambulist\Doctrine\Traits\Timestampable;

class BookAudio
{
    use Identifiable;
    use Timestampable;
    use Nameable;


    /**
     * @var User
     */
    protected $user;

    /**
     * @var Book
     */
    protected $book;

    /**
     * @var integer
     */
    protected $length;

    /**
     * @var  string
     */
    protected $body;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var integer
     */
    protected $chapter = 0;

    /**
     * @var string
     */
    protected $fileSource;


    public function __construct()
    {
        $this->setCreatedAt(new Carbon());
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return Book
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param Book $book
     */
    public function setBook(Book $book)
    {
        $this->book = $book;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
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
     * @return string
     */
    public function getFileSource()
    {
        return $this->fileSource;
    }

    /**
     * @param string $fileSource
     */
    public function setFileSource($fileSource)
    {
        $this->fileSource = $fileSource;
    }

    /**
     * @return int
     */
    public function getChapter()
    {
        return $this->chapter;
    }

    /**
     * @param int $chapter
     */
    public function setChapter($chapter)
    {
        $this->chapter = $chapter;
    }


}