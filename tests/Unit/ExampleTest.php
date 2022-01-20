<?php

namespace Plugrbase\OpenAi\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Plugrbase\OpenAi\Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(404);
    }
}
