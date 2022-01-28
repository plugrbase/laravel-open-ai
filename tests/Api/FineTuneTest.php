<?php

namespace Plugrbase\OpenAi\Tests\Feature;

use Plugrbase\OpenAi\Tests\TestCase;

class FineTuneTest extends TestCase
{
    public function test_fine_tunes_should_return_fine_tune_items()
    {
        $fineTunes = $this->openAi()->fineTune()->fineTunes();
        $this->assertNotEmpty($fineTunes);
    }
}
