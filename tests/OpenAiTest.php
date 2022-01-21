<?php

namespace Plugrbase\OpenAi\Tests;

class OpenAiTest extends TestCase
{
    public function test_open_api_can_be_created()
    {
        $openApi = $this->openAi();
        $this->assertIsObject($openApi);
    }
}
