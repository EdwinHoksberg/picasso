<?php

use Symfony\Component\HttpFoundation\Request;

$app->before(function (Request $request) {
    $request->getSession()->start();
});
