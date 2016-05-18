<?php

namespace InfusionWeb\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use Mdf\PhpUrlResolver\URLResolver;

class UrlResolver extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('resolver', function () {
            return new URLResolver();
        });
    }
}
