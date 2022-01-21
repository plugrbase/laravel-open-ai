<?php

namespace Plugrbase\OpenAi\Tests;

use Dotenv\Dotenv;
use Orchestra\Testbench\TestCase as Orchestra;
use Plugrbase\OpenAi\OpenAi;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        // Load env files
        (Dotenv::createImmutable(__DIR__.'/..', '.env'))->safeLoad();

        parent::setUp();

        $this->app['config']->set('openai-api.api_key', env('PLUGRBASE_OPENAI_API_KEY'));
        $this->app['config']->set('openai-api.api_url', env('PLUGRBASE_OPENAI_API_URL'));
    }

    protected function openAi($apiKey = null)
    {
        return new OpenAi($apiKey);
    }
}
