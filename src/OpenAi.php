<?php

namespace Plugrbase\OpenAi;

use Plugrbase\OpenAi\Api\Engines;
use Plugrbase\OpenAi\Request;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Response;

class OpenAi
{
    use Request;

    /**
     * The OpenAI API engine
     *
     * @var string
     */
    private string $engine = "davinci";

    /**
     * The client.
     *
     * @var GuzzleHttp\Client
     */
    private GuzzleClient $guzzle;

    public function __construct()
    {
        if (!config()->has('openai-api.api_key')) {
            dd('no API key found');
        }

        if (!config()->has('openai-api.api_url')) {
            dd('no API key found');
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
