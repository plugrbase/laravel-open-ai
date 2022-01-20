<?php

namespace Plugrbase\OpenAi;

use GuzzleHttp\Client as GuzzleClient;

trait Request
{
    /**
     * Make a GET request and return the response.
     *
     * @return bool|string|void
     */
    public function get(string $uri, array $data = [])
    {
        return $this->request('get', $uri, [], $data);
    }

    /**
     * Make request to API and retrun response.
     *
     * @return object
     */
    public function request(string $method, string $uri)
    {
        $this->guzzle = $this->client();
        return $this->guzzle->request($method, $uri);
    }

    /**
     * Create and return the HTTP client.
     *
     * @return object
     */
    public function client()
    {
        return new GuzzleClient([
            'base_uri' => config('openai-api.api_url'),
            'headers' => [
                'Authorization' => 'Bearer ' . config('openai-api.api_key'),
            ],
        ]);
    }
}
