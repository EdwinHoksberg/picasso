<?php

namespace App\Providers;

use Silex\Application;
use Silex\Provider\AssetServiceProvider;

class AssetProvider implements ProviderInterface
{
    public static function register(Application $app)
    {
        $app->register(new AssetServiceProvider(), [
            'assets.version_format' => '%s?v=%s',
            'assets.version' => getenv('APP_VERSION'),
        ]);
    }
}
