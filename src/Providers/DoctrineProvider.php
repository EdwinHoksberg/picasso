<?php

namespace App\Providers;

use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;

class DoctrineProvider implements ProviderInterface
{
    public static function register(Application $app)
    {
        $app->register(new DoctrineServiceProvider(), [
            'db.options' => [
                'driver'    => env('DB_DRIVER'),
                'charset'   => env('DB_CHARSET'),
                'host'      => env('DB_HOST'),
                'port'      => env('DB_PORT'),
                'dbname'    => env('DB_DATABASE'),
                'user'      => env('DB_USERNAME'),
                'password'  => env('DB_PASSWORD'),
            ],
        ]);
    }
}
