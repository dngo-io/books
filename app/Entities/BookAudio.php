<?php

namespace App\Entities;


use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Somnambulist\Doctrine\Traits\Activatable;
use Somnambulist\Doctrine\Traits\Identifiable;
use Somnambulist\Doctrine\Traits\Nameable;
use Somnambulist\Doctrine\Traits\Timestampable;

class BookAudio
{
    use Identifiable;
    use Timestampable;
    use Nameable;
    use Activatable;


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
     * @var integer
     */
    protected $chapter = 0;

    /**
     * @var int
     */

    protected $status = 0;

    /**
     * @var string
     */
    protected $fileSource;

    /** @var  ArrayCollection|AudioTags */
    protected $tags;


    public function __construct()
    {
        $this->setCreatedAt(new Carbon());
        $this->deactivate();
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

    /**
     * @return AudioTags|ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param AudioTags|ArrayCollection $tags
     */
    public function setTags(ArrayCollection $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @param $tag
     * @return bool
     * @internal param $category
     */
    public function hasTag($tag)
    {
        return $this->tags->contains($tag);
    }

    /**
     * @param AudioTags $tag
     * @return $this
     * @internal param Category $category
     */
    public function addTag(AudioTags $tag)
    {
        if (!$this->hasTag($tag)) {
            $this->tags->add($tag);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}