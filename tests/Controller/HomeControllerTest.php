<?php 
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
  public function testHomePage()
  {
      $client = static::createClient();
      $client->request('GET', '/');
      $this->assertEquals(200, $client->getResponse()->getStatusCode());
  }
}
