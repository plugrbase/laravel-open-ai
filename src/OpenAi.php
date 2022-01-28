<?php

namespace Plugrbase\OpenAi;

use GuzzleHttp\Client as GuzzleClient;
use Plugrbase\OpenAi\Api\Answer;
use Plugrbase\OpenAi\Api\Completion;
use Plugrbase\OpenAi\Api\Classification;
use Plugrbase\OpenAi\Api\Engine;
use Plugrbase\OpenAi\Api\File;
use Plugrbase\OpenAi\Api\FineTune;
use Plugrbase\OpenAi\Api\Search;

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
     * Return the answer object.
     *
     * @return \Plugrbase\OpenAi\Api\Answer
     */
    public function answer()
    {
        return new Answer($this);
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

    /**
     * Return the classification object.
     *
     * @return \Plugrbase\OpenAi\Api\Classification
     */
    public function classification(string $engine = '')
    {
        return new Classification($this, $engine);
    }

    /**
     * Return the completion object.
     *
     * @return \Plugrbase\OpenAi\Api\Completion
     */
    public function completion(string $engine = '')
    {
        return new Completion($this, $engine);
    }

    /**
     * Return the search object.
     *
     * @return \Plugrbase\OpenAi\Api\Search
     */
    public function search(string $engine = '')
    {
        return new Search($this, $engine);
    }

    /**
     * Return the file object.
     *
     * @return \Plugrbase\OpenAi\Api\File
     */
    public function file(string $engine = '')
    {
        return new File($this, $engine);
    }

    /**
     * Return the fineTUne object.
     *
     * @return \Plugrbase\OpenAi\Api\fineTUne
     */
    public function fineTUne(string $engine = '')
    {
        return new FineTUne($this, $engine);
    }
}
