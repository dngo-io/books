<?php


namespace App\Entities;


use Carbon\Carbon;
use Somnambulist\Doctrine\Traits\Identifiable;

class Stats
{

    use Identifiable;

    /**
     * @var integer
     */
    protected $audio;

    /**
     * @var integer
     */
    protected $book;

    /**
     * @var integer
     */
    protected $post;

    /**
     * @var integer
     */
    protected $user;

    /**
     * @var integer
     */
    protected $upvote;

    /**
     * @var integer
     */
    protected $comment;

    /**
     * @var Carbon
     */
    protected $day;

    /**
     * @return int
     */
    public function getAudioId()
    {
        return $this->audio;
    }

    /**
     * @param int $audio
     */
    public function setAudioId($audio)
    {
        $this->audio = $audio;
    }

    /**
     * @return int
     */
    public function getBookId()
    {
        return $this->book;
    }

    /**
     * @param int $book
     */
    public function setBookId($book)
    {
        $this->book = $book;
    }

    /**
     * @return int
     */
    public function getPostId()
    {
        return $this->post;
    }

    /**
     * @param int $post
     */
    public function setPostId($post)
    {
        $this->post = $post;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user;
    }

    /**
     * @param int $user
     */
    public function setUserId($user)
    {
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getUpvote()
    {
        return $this->upvote;
    }

    /**
     * @param int $upvote
     */
    public function setUpvote($upvote)
    {
        $this->upvote = $upvote;
    }

    /**
     * @return int
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param int $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return Carbon
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param Carbon $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    public function increaseComment()
    {
        $this->comment++;
    }

    public function increaseUpvote()
    {
        $this->upvote++;
    }
}