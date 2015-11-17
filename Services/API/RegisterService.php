<?php

namespace Micro\BaseServiceBundle\Services\API;

use Micro\ClientBundle\Rest\Client;

class RegisterService {

    /**
     *
     * @var Client
     */
    private $client;
    
    function __construct(Client $client) {
        $this->client = $client;
    }

    
    public function register($config) {
        return $this->client->callRestfulApi('POST', 'api/services/registers', $config);
    }

}
