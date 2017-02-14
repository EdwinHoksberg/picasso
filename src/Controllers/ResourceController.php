<?php

namespace App\Controllers;

use App\Application;
use Symfony\Component\HttpFoundation\Request;

class ResourceController
{
    public function index(Request $request, Application $app)
    {
        return 'index';
    }

    public function create(Request $request, Application $app)
    {
        return 'create';
    }

    public function store(Request $request, Application $app)
    {
        return 'store';
    }

    public function edit(Request $request, Application $app, $id)
    {
        return 'edit '.$id;
    }

    public function update(Request $request, Application $app, $id)
    {
        return 'update '.$id;
    }

    public function delete(Request $request, Application $app, $id)
    {
        return 'delete '.$id;
    }
}
