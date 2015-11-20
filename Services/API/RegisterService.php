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

    public function register($serviceName, $config) {
        return $this->client->callRestfulApi('PUT', "api/services/$serviceName/provider", $config);
    }

}
