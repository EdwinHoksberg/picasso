<?php

$app->get('/', 'App\Controllers\HomeController::index');

$app->resource('/resource', 'App\Controllers\ResourceController');
