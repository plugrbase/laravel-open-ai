<?php

namespace Plugrbase\OpenAi\Tests\Feature;

use Plugrbase\OpenAi\Tests\TestCase;

class EngineTest extends TestCase
{
    public function test_engines_list_should_return_engine_items()
    {
        $engines = $this->openAi()->engine()->list();
        $this->assertNotEmpty($engines);
    }

    public function test_engines_get_should_engine()
    {
        $engine = $this->openAi()->engine()->get('davinci');
        $this->assertNotEmpty($engine);
    }
}
