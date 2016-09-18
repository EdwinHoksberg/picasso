<?php

namespace App\Controllers;

use App\SilexApplication;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function index(Request $request, SilexApplication $app)
    {
        return $app->renderView('home/index.twig');
    }
}
