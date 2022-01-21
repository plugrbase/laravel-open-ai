<?php

namespace Plugrbase\OpenAi\Api;

use Plugrbase\OpenAi\Enums\EngineType;

class ApiEntity
{
    /**
     * The default engine.
     */
    public string $engine = EngineType::DAVINCI;

    /**
     * The openApi object.
     */
    public object $openAi;

    /**
     * Create a new object instance.
     *
     * @return void
     */
    public function __construct(object $openAi, string $engine = null)
    {
        $this->openAi = $openAi;

        if ($engine != '') {
            $this->engine = $engine;
        }
    }
}
