<?php

namespace Micro\BaseServiceBundle\Services\API;

class ConfigurationService {
    /**
     *
     * @var array
     */
    private $configuration;
    
    function __construct(array $configuration, $serverUrl) {
        $serverConfig = ["host"=>$serverUrl];
        $configuration = array_merge($configuration, $serverConfig);
        $this->configuration = $configuration;
    }
    
    public function getConfiguration()
    {
        return $this->configuration;
    }

}
