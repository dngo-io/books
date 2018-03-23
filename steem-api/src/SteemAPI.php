<?php

namespace SteemAPI;

use SteemAPI\Account as Account;
use SteemAPI\Post as Post;

class SteemAPI
{

    /**
     * Steemit constructor
     */
    public function __construct()
    {
        // Nothing to do for now :/
    }

    /**
     * @return \SteemAPI\Account
     */
    public function getAccount()
    {
        require_once 'API/Account.php';
        return new Account();
    }


    /**
     * @return \SteemAPI\Post
     */
    public function getPost()
    {
        require_once 'API/Post.php';
        return new Post();
    }

}