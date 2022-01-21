<?php

namespace Plugrbase\OpenAi\Api;

class ApiEntity
{
    /**
     * The openApi object.
     */
    public object $openAi;

    /**
     * Create a new object instance.
     *
     * @return void
     */
    public function __construct(object $openAi)
    {
        $this->openAi = $openAi;
    }
}
