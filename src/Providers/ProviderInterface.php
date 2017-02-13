<?php

namespace App\Providers;

use Silex\Application;

interface ProviderInterface
{
    public static function register(Application $app);
}
