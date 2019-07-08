<?php


namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ControllerTest extends WebTestCase
{
public function testCreate()
{
$client = static::createClient();

$client->request('GET', '/post/create');

$this->assertEquals(404, $client->getResponse()->getStatusCode());
}
}