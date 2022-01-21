<?php

namespace Plugrbase\OpenAi\Exceptions;

use Exception;

class RequestException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Wrong request.');
    }
}
