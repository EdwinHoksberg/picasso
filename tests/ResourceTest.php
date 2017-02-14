<?php

class ResourceTest extends \Silex\WebTestCase
{
    public function createApplication()
    {
        $app = require __DIR__.'/../web/index.php';
        unset($app['exception_handler']);

        $app['debug'] = true;
        $app['session.test'] = true;

        return $app;
    }

    public function testIndexRoute()
    {
        $client = $this->createClient();
        $client->request('GET', '/resource/');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertSame('index', $client->getResponse()->getContent());
    }

    public function testCreateRoute()
    {
        $client = $this->createClient();
        $client->request('GET', '/resource/create');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertSame('create', $client->getResponse()->getContent());
    }

    public function testStoreRoute()
    {
        $client = $this->createClient();
        $client->request('POST', '/resource/store');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertSame('store', $client->getResponse()->getContent());
    }

    public function testEditRoute()
    {
        $client = $this->createClient();
        $client->request('GET', '/resource/edit/1');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertSame('edit 1', $client->getResponse()->getContent());
    }

    public function testUpdateRoute()
    {
        $client = $this->createClient();
        $client->request('PUT', '/resource/update/2');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertSame('update 2', $client->getResponse()->getContent());

        $client->request('PATCH', '/resource/update/3');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertSame('update 3', $client->getResponse()->getContent());
    }

    public function testDeleteRoute()
    {
        $client = $this->createClient();
        $client->request('DELETE', '/resource/delete/4');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertSame('delete 4', $client->getResponse()->getContent());
    }
}
