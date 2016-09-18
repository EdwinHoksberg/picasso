<?php

require_once __DIR__.'/../vendor/autoload.php';

// Make php development server compatible
if (php_sapi_name() === 'cli-server') {
    $filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (is_file($filename)) {
        return false;
    }
}

$app = new App\SilexApplication();
$app['debug'] = true;

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../App/Views',
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'    => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => '',
        'user'      => 'root',
        'password'  => 'toor',
        'charset'   => 'utf8mb4',
    ),
));

require __DIR__.'/../App/routes.php';

$app->run();
