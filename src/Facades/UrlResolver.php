<?php

namespace InfusionWeb\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class UrlResolver extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'resolver';
    }
}
