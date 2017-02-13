<?php

namespace App;

use Silex\Application as SilexApplication;
use Silex\Application\TwigTrait;
use Silex\Application\UrlGeneratorTrait;

class Application extends SilexApplication
{
    use TwigTrait;
    use UrlGeneratorTrait;
}
