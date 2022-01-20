<?php

namespace Plugrbase\OpenAi\Tests\Feature;

use Plugrbase\OpenAi\Tests\TestCase;

class EnginesTest extends TestCase
{
    public function test_engines_list_should_return_engine_items()
    {
        $engines = $this->openAi()->engines()->list();
        $this->assertNotEmpty($engines);
    }

    public function test_engines_get_should_engine()
    {
        $engine = $this->openAi()->engines()->get('davinci');
        $this->assertNotEmpty($engine);
    }
}
