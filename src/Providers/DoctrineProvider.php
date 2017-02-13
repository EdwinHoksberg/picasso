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
                'driver'    => getenv('DB_DRIVER'),
                'charset'   => getenv('DB_CHARSET'),
                'host'      => getenv('DB_HOST'),
                'port'      => getenv('DB_PORT'),
                'dbname'    => getenv('DB_DATABASE'),
                'user'      => getenv('DB_USERNAME'),
                'password'  => getenv('DB_PASSWORD'),
            ],
        ]);
    }
}
