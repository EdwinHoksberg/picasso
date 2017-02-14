<?php

use App\Providers;

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
$app['debug'] = env('APP_DEBUG', false);

$providers = [
    Providers\SessionProvider::class,
    Providers\TwigProvider::class,
    Providers\AssetProvider::class,
    Providers\DoctrineProvider::class,
    Providers\ServiceControllerProvider::class,
    Providers\HttpFragmentProvider::class,
    Providers\VarDumperProvider::class,
    Providers\WebProfilerProvider::class,
    Providers\DoctrineProfilerProvider::class,
    Providers\WhoopsProvider::class,
];

foreach ($providers as $provider) {
    $provider::register($app);
}

require ROOT_DIR.'/src/middleware.php';

require ROOT_DIR.'/src/routes.php';

if ($app['debug'] && defined('PHPUNIT_TESTSUITE')) {
    return $app;
}

$app->run();
