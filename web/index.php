<?php

use App\Providers;

// Define a root directory constant
if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', dirname(__DIR__));
}

// Require composer autoload
require_once ROOT_DIR.'/vendor/autoload.php';

// Make php development server compatible
if (php_sapi_name() === 'cli-server') {
    $filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (is_file($filename)) {
        return false;
    }
}

// Load configuration from the .env file
$dotenv = new \Dotenv\Dotenv(ROOT_DIR);
$dotenv->load();

// Create the application and set debug mode
$app = new App\Application();
$app['debug'] = env('APP_DEBUG', false);

// Define all providers to be loaded
$providers = [
    Providers\SessionProvider::class,
    Providers\TwigProvider::class,
    Providers\AssetProvider::class,
    Providers\DoctrineProvider::class,
    Providers\DoctrineOrmProvider::class,
    Providers\ServiceControllerProvider::class,
    Providers\HttpFragmentProvider::class,
    Providers\VarDumperProvider::class,
    Providers\WebProfilerProvider::class,
    Providers\DoctrineProfilerProvider::class,
    Providers\WhoopsProvider::class,
];

// Load all previously defined providers
foreach ($providers as $provider) {
    $provider::register($app);
}

// Load middleware
require ROOT_DIR.'/src/middleware.php';

// Load application routes
require ROOT_DIR.'/src/routes.php';

// If APP_BOOTSTRAP was defined, we return the app object, this is used for testing and cli tools
if (defined('APP_BOOTSTRAP')) {
    return $app;
}

// Run the application
$app->run();
