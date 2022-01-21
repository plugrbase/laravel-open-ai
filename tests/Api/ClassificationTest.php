<?php

namespace Plugrbase\OpenAi\Tests\Feature;

use Plugrbase\OpenAi\Enums\EngineType;
use Plugrbase\OpenAi\Tests\TestCase;

class ClassificationTest extends TestCase
{
    public function test_classification_create_should_return_data()
    {
        $params = [
            'examples' => [
                ['A happy moment', 'Positive'],
                ['I am sad.', 'Negative'],
                ['I am feeling awesome', 'Positive']
            ],
            'labels' => ['Positive', 'Negative', 'Neutral'],
            'query' => 'It is a raining day :(',
            'search_model' => 'ada',
            'model' => 'curie'
        ];

        $classification = $this->openAi()->classification(EngineType::DAVINCI)->create($params);
        $this->assertNotEmpty($classification);
        $this->assertCount(3, $classification->selected_examples);
    }
}
