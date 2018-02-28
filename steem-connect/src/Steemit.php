<?php

namespace Steem;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Steemit
{

    /**
     * Domain
     *
     * @var string
     */
    private $domain = 'https://v2.steemconnect.com/api';

    /**
     * Access Token
     *
     * @var string
     */
    private $token;

    /**
     * Object of operations
     *
     * @var Operations
     */
    private $operations;

    /**
     * Steemit constructor
     */
    public function __construct()
    {
        $this->operations = new Operations();
    }

    /**
     * Return headers
     *
     * @param  array $options Header array
     * @return array
     */
    private function getHeaders(array $options = [])
    {
        $headears = array_merge([
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
            'Authorization' => "Bearer $this->token"
        ], $options);

        return $headears;
    }

    /**
     * Create client via Guzzle!
     *
     * @return Client
     */
    private function getClient()
    {
        return new Client();
    }

    /**
     * Set access token
     *
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Return access token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set domain
     *
     * @param  string $domain
     *
     * @return $this
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Execute broadcast operations
     *
     * @param array  $body
     * @return array
     */
    private function broadcast($body)
    {
        $method   = 'POST';
        $url      = "{$this->domain}/broadcast";
        $headears = $this->getHeaders();
        $body     = json_encode($body);

        try {
            $request = $this->getClient()->request($method, $url, [
                'headers' => $headears,
                'body'    => $body
            ]);

            $response = $request->getBody()->getContents();

            return json_decode($response, true);

        } catch (RequestException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            $response = json_decode($response, true);
            return $response;
        } catch (\Exception $e) {
            return ['error' => $e->getCode(), 'error_description' => $e->getMessage()];
        }
    }

    /**
     * Execute an operation to broadcast!
     *
     * @param  string $do     Name of the operation
     * @param  array  $params Required parameters
     * @return array
     */
    public function exec($do, array $params)
    {
        $body = call_user_func_array(array($this->operations, $do), $params);

        return $this->broadcast($body);
    }
}