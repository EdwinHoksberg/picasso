<?php

namespace App\Providers;

use Silex\Application;
use Silex\Provider\TwigServiceProvider;

class TwigProvider implements ProviderInterface
{
    public static function register(Application $app)
    {
        $app->register(new TwigServiceProvider(), [
            'twig.path' => ROOT_DIR.'/src/Views',
            'twig.options' => [
                'cache' => $app['debug'] ? false : ROOT_DIR.'/storage/twig',
            ],
        ]);
    }
}
