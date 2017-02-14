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

        $app['twig'] = $app->extend('twig', function (\Twig_Environment $twig, Application $app) {
            $twig->addFunction(new \Twig_SimpleFunction('env', function ($name, $default = null) {
                return env($name, $default);
            }));

            return $twig;
        });
    }
}
