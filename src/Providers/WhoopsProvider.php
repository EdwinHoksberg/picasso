<?php

namespace App\Providers;

use Silex\Application;
use WhoopsSilex\WhoopsServiceProvider;

class WhoopsProvider implements ProviderInterface
{
    public static function register(Application $app)
    {
        if (!$app['debug']) {
            return;
        }

        $app->register(new WhoopsServiceProvider());
    }
}
