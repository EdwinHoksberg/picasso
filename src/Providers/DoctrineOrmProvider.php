<?php

namespace App\Providers;

use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Application;

class DoctrineOrmProvider implements ProviderInterface
{
    public static function register(Application $app)
    {
        $app->register(new DoctrineOrmServiceProvider, array(
            'orm.proxies_dir' => ROOT_DIR.'/storage/doctrine/',
            'orm.em.options' => array(
                'mappings' => array(
                    [
                        'type' => 'annotation',
                        'namespace' => 'App\Entities',
                        'path' => ROOT_DIR.'/src/Entities/',
                    ],
                ),
            ),
        ));
    }
}
