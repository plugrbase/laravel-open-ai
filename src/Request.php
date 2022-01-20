<?php

namespace Plugrbase\OpenAi;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Response;

trait Request
{
    /**
     * Make a GET request and return the response.
     *
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function get($uri, array $data = [])
    {
        return $this->request('get', $uri, [], $data);
    }

    /**
     * @param string $method
     * @param string $uri
     *
     * @return object
     */
    public function request(string $method, string $uri)
    {
        $this->guzzle = $this->client();
        return $this->guzzle->request($method, $uri);
    }

    /**
     * @param string $method
     * @param string $uri
     *
     * @return object
     */
    public function client()
    {
        return new GuzzleClient([
            'base_uri' => config('openai-api.api_url'),
            'headers' => [
                "Authorization" => "Bearer " . config('openai-api.api_key'),
            ],
        ]);
    }
}
