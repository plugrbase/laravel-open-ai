<?php

namespace Plugrbase\Facades\OpenAi;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Plugrbase\OpenAi\Skeleton\SkeletonClass
 */
class OpenAiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'open-ai';
    }
}
