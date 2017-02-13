<?php

define('ROOT_DIR', dirname(__DIR__));

require_once ROOT_DIR.'/vendor/autoload.php';

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

$app->register(new Silex\Provider\SessionServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => ROOT_DIR.'/src/Views',
    'twig.options' => [
        'cache' => $app['debug'] ? false : ROOT_DIR.'/storage/twig',
    ],
]);

$app->register(new Silex\Provider\AssetServiceProvider(), [
    'assets.version_format' => '%s?v=%s',
    'assets.version' => getenv('APP_VERSION'),
]);

$app->register(new Silex\Provider\VarDumperServiceProvider());

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->register(new Silex\Provider\HttpFragmentServiceProvider());

if ($app['debug']) {
    $app->register(new \Silex\Provider\WebProfilerServiceProvider(), [
        'profiler.cache_dir' => ROOT_DIR.'/storage/profiler',
    ]);

    $app->register(new Sorien\Provider\DoctrineProfilerServiceProvider());

    $app->register(new \WhoopsSilex\WhoopsServiceProvider());
}

$app->register(new Silex\Provider\DoctrineServiceProvider(), [
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

require ROOT_DIR.'/src/middleware.php';

require ROOT_DIR.'/src/routes.php';

$app->run();
