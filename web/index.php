<?php

define('ROOT_DIR', __DIR__.'/../');

require_once ROOT_DIR.'vendor/autoload.php';

// Make php development server compatible
if (php_sapi_name() === 'cli-server') {
    $filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (is_file($filename)) {
        return false;
    }
}

$dotenv = new \Dotenv\Dotenv(ROOT_DIR);
$dotenv->load();

$app = new App\Application();
$app['debug'] = (getenv('APP_DEBUG') === 'true');

$app->register(new Silex\Provider\RoutingServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => ROOT_DIR.'App/Views',
));

$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version_format' => '%s?v=%s',
    'assets.version' => getenv('APP_VERSION'),
));

$app->register(new Silex\Provider\VarDumperServiceProvider());

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->register(new Silex\Provider\HttpFragmentServiceProvider());

$app->register(new \Silex\Provider\WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => '/tmp',
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'    => getenv('DB_DRIVER'),
        'charset'   => getenv('DB_CHARSET'),
        'host'      => getenv('DB_HOST'),
        'port'      => getenv('DB_PORT'),
        'dbname'    => getenv('DB_DATABASE'),
        'user'      => getenv('DB_USERNAME'),
        'password'  => getenv('DB_PASSWORD'),
    ),
));

require ROOT_DIR.'App/routes.php';

$app->run();
