<?php

namespace App\Providers;

use Silex\Application;
use Silex\Provider\SessionServiceProvider;

class SessionProvider implements ProviderInterface
{
    public static function register(Application $app)
    {
        $app->register(new SessionServiceProvider());
    }
}
