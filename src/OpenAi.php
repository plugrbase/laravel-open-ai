<?php

namespace Plugrbase\OpenAi;

use GuzzleHttp\Client as GuzzleClient;
use Plugrbase\OpenAi\Api\Engines;

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
     * Return the engines object.
     *
     * @return \Plugrbase\OpenAi\Api\Engines
     */
    public function engines()
    {
        return new Engines($this);
    }
}
