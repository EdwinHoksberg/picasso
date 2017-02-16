<?php

namespace App\Controllers;

use App\Application;
use App\Entities\Product;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function index(Request $request, Application $app)
    {
        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(19.99);
        $product->setDescription('Awesome description!');

        $em = $app['orm.em'];
        $em->persist($product);

        $em->flush();

        var_dump($product->getId());exit;

        return $app->renderView('home/index.twig');
    }
}
