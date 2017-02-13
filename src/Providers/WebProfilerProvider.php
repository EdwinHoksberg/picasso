<?php

namespace App\Providers;

use Silex\Application;
use Silex\Provider\WebProfilerServiceProvider;

class WebProfilerProvider implements ProviderInterface
{
    public static function register(Application $app)
    {
        if (!$app['debug']) {
            return;
        }

        $app->register(new WebProfilerServiceProvider(), [
            'profiler.cache_dir' => ROOT_DIR.'/storage/profiler',
        ]);
    }
}
