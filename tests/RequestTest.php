<?php

namespace Plugrbase\OpenAi\Tests;

use Plugrbase\OpenAi\Exceptions\AuthorizationException;
use Plugrbase\OpenAi\Exceptions\NotFoundException;

class RequestTest extends TestCase
{
    public function test_get_request_works()
    {
        $engines = $this->openAi()->get('engines');
        $this->assertNotEmpty($engines);
    }

    public function test_request_should_return_not_found_message()
    {
        try {
            $this->openAi()->get('toto');
        } catch (NotFoundException $e) {
            $this->assertSame($e->getMessage(), (new NotFoundException)->getMessage());
        }
    }

    public function test_request_should_return_unauthorized()
    {
        try {
            $this->openAi('wrong-key-here')->get('engines');
        } catch (AuthorizationException $e) {
            $this->assertSame($e->getMessage(), (new AuthorizationException)->getMessage());
        }
    }
}
