<?php

namespace Jianjye\LaravelBasicSearch;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jianjye\LaravelBasicSearch\Skeleton\SkeletonClass
 */
class LaravelBasicSearchFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-basic-search';
    }
}
