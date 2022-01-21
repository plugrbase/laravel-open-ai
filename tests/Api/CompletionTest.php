<?php

namespace Plugrbase\OpenAi\Tests\Feature;

use Plugrbase\OpenAi\Enums\EngineType;
use Plugrbase\OpenAi\Tests\TestCase;

class CompletionTest extends TestCase
{
    public function test_completion_create_should_return_data()
    {
        $params = [
            'headers' => ['content-type' => 'application/json'],
            'body' => json_encode(['prompt' => 'Write a tagline for an ice cream shop.'])
        ];

        $engine = $this->openAi()->completion()->create(EngineType::DAVINCI, $params);
        $this->assertNotEmpty($engine);
    }

    public function test_completion_complete_should_return_choices()
    {
        $params = [
            'prompt' => 'Write a tagline for an ice cream shop.'
        ];

        $engine = $this->openAi()->completion(EngineType::DAVINCI)->complete($params);
        $this->assertNotEmpty($engine);
    }

    public function test_completion_complete_with_multiple_prompts()
    {
        $params = [
            'prompt' => [
                'Hello, who are you?',
                'How what is your name?',
            ]
        ];

        $engine = $this->openAi()->completion(EngineType::DAVINCI)->complete($params);
        $this->assertNotEmpty($engine);
        $this->assertCount(2, $engine->choices);
    }
}
