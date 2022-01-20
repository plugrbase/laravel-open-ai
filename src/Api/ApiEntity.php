<?php

namespace Plugrbase\OpenAi\Api;

class ApiEntity
{
    public $openAi;

    public function __construct($openAi)
    {
        $this->openAi = $openAi;
    }
}
