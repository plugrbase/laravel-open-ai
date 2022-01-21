<?php

namespace Plugrbase\OpenAi\Tests\Feature;

use Plugrbase\OpenAi\Enums\EngineType;
use Plugrbase\OpenAi\Tests\TestCase;

class AnswerTest extends TestCase
{
    public function test_answer_create_should_return_data()
    {
        $params = [
            'documents' => [
                'Puppy A is happy.',
                'Puppy B is sad.'
            ],
            'question' => 'which puppy is happy?',
            'examples' => [
                ['What is human life expectancy in the United States?', '78 years.']
            ],
            'examples_context' => 'In 2017, U.S. life expectancy was 78.6 years.',
            'model' => 'curie'
        ];

        $answer = $this->openAi()->answer(EngineType::DAVINCI)->create($params);
        $this->assertNotEmpty($answer);
        $this->assertCount(2, $answer->selected_documents);
    }
}
