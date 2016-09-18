<?php

namespace App;

use Silex\Application;
use Silex\Application\TwigTrait;
use Silex\Application\UrlGeneratorTrait;

class SilexApplication extends Application
{
    use TwigTrait;
    use UrlGeneratorTrait;
}
