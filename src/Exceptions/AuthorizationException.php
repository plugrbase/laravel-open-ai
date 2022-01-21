<?php

namespace Plugrbase\OpenAi\Exceptions;

use Exception;

class AuthorizationException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Uou are not authorized to access this resource.');
    }
}
