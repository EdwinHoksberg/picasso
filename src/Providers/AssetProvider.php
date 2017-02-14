<?php

namespace App\Providers;

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class AssetProvider implements ProviderInterface
{
    public static function register(Application $app)
    {
        $app->register(new AssetServiceProvider(), [
            'assets.base_urls' => Request::createFromGlobals()->getSchemeAndHttpHost(),
            'assets.version_format' => '%s?v=%s',
            'assets.version' => env('APP_VERSION'),
        ]);
    }
}
