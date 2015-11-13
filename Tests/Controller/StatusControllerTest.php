<?php

namespace Micro\BaseServiceBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StatusControllerTest extends WebTestCase {

    public function testIndex() {
        $client = static::createClient();

        $client->request('GET', '/api/status');

        $response = $client->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJSON($response->getContent());
        $result = json_decode($response->getContent(), true);
        $this->assertEquals(array('msg' => 'OK'), $result);
    }

}
