<?php

namespace Plugrbase\OpenAi;

use GuzzleHttp\Client as GuzzleClient;
use Plugrbase\OpenAi\Api\Engine;

class OpenAi
{
    use Request;

    /**
     * The API Key.
     */
    protected string $apiKey;

    /**
     * The client.
     */
    private GuzzleClient $guzzle;

    /**
     * Create a new OpenAI instance.
     *
     * @return void
     */
    public function __construct(string $apiKey = null)
    {
        if (! is_null($apiKey)) {
            $this->apiKey = $apiKey;
        }
        
        if (is_null($apiKey) && config()->has('openai-api.api_key')) {
            $this->apiKey = config('openai-api.api_key');
        }

        if (config()->has('openai-api.api_url') && $this->apiKey != '') {
            $this->setClient(config('openai-api.api_url'), $this->apiKey);
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
