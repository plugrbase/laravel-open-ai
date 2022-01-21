<?php

namespace Plugrbase\OpenAi;

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
     * Make request to API and return response.
     *
     * @return object
     */
    public function request(string $method, string $uri)
    {
        return $this->guzzle->request($method, $uri);
    }
}
