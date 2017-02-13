<?php

namespace App\Providers;

use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;

class ServiceControllerProvider implements ProviderInterface
{
    public static function register(Application $app)
    {
        $app->register(new ServiceControllerServiceProvider());
    }
}
