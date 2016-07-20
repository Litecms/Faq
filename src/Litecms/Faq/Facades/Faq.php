<?php

namespace Litecms\Faq\Facades;

use Illuminate\Support\Facades\Facade;

class Faq extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'faq';
    }
}
