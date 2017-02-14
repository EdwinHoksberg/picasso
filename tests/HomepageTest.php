<?php

class HomepageTest extends \Silex\WebTestCase
{
    public function createApplication()
    {
        $app = require __DIR__.'/../web/index.php';
        unset($app['exception_handler']);

        $app['debug'] = true;
        $app['session.test'] = true;

        return $app;
    }

    public function testHomepage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(1, $crawler->filter('h1:contains("Silex base - v' . env('APP_VERSION') . '")'));
    }
}
