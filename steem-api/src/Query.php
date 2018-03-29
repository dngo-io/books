<?php

namespace SteemAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Query
{

    /**
     * Domain
     *
     * @var string
     */
    private $domain = 'https://api.steemjs.com';

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
     * Create client via Guzzle!
     *
     * @return Client
     */
    private function getClient()
    {
        return new Client();
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
     * Make requests
     *
     * @param  array $request
     * @return array
     */
    protected function call($request)
    {
        if(!isset($request['query']))
        {
            $request['query'] = [];
        }

        $method  = 'GET';
        $headers = $this->getHeaders();
        $query   = http_build_query($request['query']);
        $url     = "{$this->domain}/{$request['route']}?$query";

        try {
            $request = $this->getClient()->request($method, $url, [
                'headers' => $headers
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
}