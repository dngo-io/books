<?php

namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Somnambulist\Doctrine\Traits\Activatable;
use Somnambulist\Doctrine\Traits\Identifiable;
use Somnambulist\Doctrine\Traits\Timestampable;

class Post implements \Somnambulist\Doctrine\Contracts\Activatable
{

    use Identifiable;
    use Activatable;
    use Timestampable;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var ArrayCollection|Category
     */
    protected $categories;

    /**
     * @var User
     */
    protected $user;


    /**
     * @var integer
     */
    protected $status;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
    public function setUser($user)
    {
        $this->user = $user;
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

    /**
     * @param $category
     * @return bool
     */
    public function hasCategory($category)
    {
        return $this->categories->contains($category);
    }

    /**
     * @return Category|ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category|ArrayCollection $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function addCategory(Category $category)
    {
        if (!$this->hasCategory($category)) {
            $this->categories->add($category);
        }

        return $this;
    }
}