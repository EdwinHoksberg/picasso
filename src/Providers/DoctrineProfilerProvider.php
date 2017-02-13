<?php

namespace App\Providers;

use Silex\Application;
use Sorien\Provider\DoctrineProfilerServiceProvider;

class DoctrineProfilerProvider implements ProviderInterface
{
    public static function register(Application $app)
    {
        if (!$app['debug']) {
            return;
        }

        $app->register(new DoctrineProfilerServiceProvider());
    }
}
