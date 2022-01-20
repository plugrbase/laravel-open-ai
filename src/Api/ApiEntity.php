<?php

namespace Plugrbase\OpenAi\Api;

class ApiEntity
{
    /**
     * The openApi object.
     *
     * @var object
     */
    public $openAi;

    public function __construct($openAi)
    {
        $this->openAi = $openAi;
    }
}
