<?php

namespace App\Entities;


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

}