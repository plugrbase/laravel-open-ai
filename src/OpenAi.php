<?php

namespace Plugrbase\OpenAi;

use GuzzleHttp\Client as GuzzleClient;
use Plugrbase\OpenAi\Api\Engine;

class OpenAi
{
    use Request;

    /**
     * The client.
     *
     * @var GuzzleHttp\Client
     */
    private GuzzleClient $guzzle;

    /**
     * Create a new OpenAI instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (config()->has('openai-api.api_url') && config()->has('openai-api.api_key')) {
            $this->setClient(config('openai-api.api_url'), config('openai-api.api_key'));
        }
    }

    /**
     * Create the HTTP client.
     *
     * @return object
     */
    public function setClient(string $uri, string $apiKey)
    {
        $this->guzzle = new GuzzleClient([
            'base_uri' => $uri,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ],
        ]);

        return $this;
    }

    /**
     * Return the engine object.
     *
     * @return \Plugrbase\OpenAi\Api\Engine
     */
    public function engine()
    {
        return new Engine($this);
    }
}
