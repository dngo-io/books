<?php

namespace App\Service;

class SteemService
{

    /**
     * @var string
     */
    private $node;

    public function __construct()
    {
        $this->node = config('steem.node');
    }

    /**
     * @return \SteemPHP\SteemAccount
     */
    public function getAccount()
    {
        return new \SteemPHP\SteemAccount($this->node);
    }

    /**
     * @return \SteemPHP\SteemAddress
     */
    public function getAddress()
    {
        return new \SteemPHP\SteemAddress($this->node);
    }

    /**
     * @return \SteemPHP\SteemArticle
     */
    public function getArticle()
    {
        return new \SteemPHP\SteemArticle($this->node);
    }

    /**
     * @return \SteemPHP\SteemAuth
     */
    public function getAuth()
    {
        return new \SteemPHP\SteemAuth($this->node);
    }

    /**
     * @return \SteemPHP\SteemBlock
     */
    public function getBlock()
    {
        return new \SteemPHP\SteemBlock($this->node);
    }

    /**
     * @return \SteemPHP\SteemChain
     */
    public function getChain()
    {
        return new \SteemPHP\SteemChain($this->node);
    }

    /**
     * @return \SteemPHP\SteemConfig
     */
    public function getConfig()
    {
        return new \SteemPHP\SteemConfig();
    }

    /**
     * @return \SteemPHP\SteemMarket
     */
    public function getMarket()
    {
        return new \SteemPHP\SteemMarket($this->node);
    }

    /**
     * @return \SteemPHP\SteemWitness
     */
    public function getWitness()
    {
        return new \SteemPHP\SteemWitness($this->node);
    }

}