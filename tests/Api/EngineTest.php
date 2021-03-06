<?php

namespace Plugrbase\OpenAi\Tests\Feature;

use Plugrbase\OpenAi\Tests\TestCase;

class EngineTest extends TestCase
{
    public function test_engines_should_return_engine_items()
    {
        $engines = $this->openAi()->engine()->engines();
        $this->assertNotEmpty($engines);
    }

    public function test_engines_engine_should_return_engine()
    {
        $engine = $this->openAi()->engine()->engine('davinci');
        $this->assertNotEmpty($engine);
    }
}
