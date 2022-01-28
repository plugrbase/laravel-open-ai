<?php

namespace Plugrbase\OpenAi\Tests\Feature;

use Plugrbase\OpenAi\Enums\EngineType;
use Plugrbase\OpenAi\Tests\TestCase;

class SearchTest extends TestCase
{
    public function test_search_document_should_return_data()
    {
        $params = [
            'documents' => ['puppy A is happy'],
            'query' => 'happy',
            'search_model' => 'ada',
            'max_rerank' => 5
        ];

        $search = $this->openAi()->search(EngineType::DAVINCI)->make($params);
        $this->assertNotEmpty($search);
        $this->assertCount(1, $search->data);
    }

    public function test_search_multiple_document_should_return_data()
    {
        $params = [
            'documents' => ['puppy A is happy', 'puppy B is sad', 'puppy C is sad'],
            'query' => 'happy',
            'search_model' => 'ada',
            'max_rerank' => 5
        ];

        $search = $this->openAi()->search(EngineType::DAVINCI)->make($params);
        $this->assertNotEmpty($search);
        $this->assertCount(3, $search->data);
    }
}
