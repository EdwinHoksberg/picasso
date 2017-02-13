<?php

namespace App\Providers;

use Silex\Application;
use Silex\Provider\VarDumperServiceProvider;

class VarDumperProvider implements ProviderInterface
{
    public static function register(Application $app)
    {
        $app->register(new VarDumperServiceProvider());
    }
}
