<?php

namespace App\Providers;

use Silex\Application;
use Silex\Provider\HttpFragmentServiceProvider;

class HttpFragmentProvider implements ProviderInterface
{
    public static function register(Application $app)
    {
        $app->register(new HttpFragmentServiceProvider());
    }
}
