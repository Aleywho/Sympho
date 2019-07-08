<?php


namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ControllerTest extends WebTestCase
{
    //test de route fonctionel
    public function testHome()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
// test de route inexistante
    public function testnoPage()
    {
        $client = static::createClient();

        $client->request('GET', '/abc');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}

