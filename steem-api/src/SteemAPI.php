<?php

namespace SteemAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SteemAPI
{
    /**
     * @var string
     */
    public $domain = '';

    /**
     * Steemit constructor
     */
    public function __construct()
    {
        // Nothing to do for now :/
    }

    /**
     * Return headers
     *
     * @param  array $options Header array
     * @return array
     */
    private function getHeaders(array $options = [])
    {
        $headers = array_merge([
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
        ], $options);

        return $headers;
    }

    /**
     * Set domain
     *
     * @param  string $domain
     * @return $this
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return new \SteemAPI\Account();
    }


    /**
     * @return Post
     */
    public function getPost()
    {
        return new \SteemAPI\Post();
    }

}