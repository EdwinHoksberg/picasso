<?php

namespace App\Controllers;

use App\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function index(Request $request, Application $app)
    {
        return $app->renderView('home/index.twig');
    }
}
