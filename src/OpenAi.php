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

    public function __construct()
    {
        if (!config()->has('openai-api.api_key')) {
            // @todo - throw an error
        }

        if (!config()->has('openai-api.api_url')) {
            // @todo - throw an error
        }
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
