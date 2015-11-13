<?php

namespace Micro\BaseServiceBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StatusRestControllerTest extends WebTestCase {

    /**
     * @test
     */
    public function statusReturnsOK() {
        $client = static::createClient();

        $client->request('GET', '/api/service/status');

        $response = $client->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJSON($response->getContent());
        $result = json_decode($response->getContent(), true);
        $this->assertEquals(array('msg' => 'OK'), $result);
    }
    
    /**
     * @test
     */
    public function loadAvgReturnsArrayOfLoadAverage() {
        $client = static::createClient();

        $client->request('GET', '/api/service/loadavg');

        $response = $client->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJSON($response->getContent());
        $result = json_decode($response->getContent(), true);
        $this->assertEquals(sys_getloadavg(),$result);
    }

}
