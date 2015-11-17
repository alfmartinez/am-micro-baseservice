<?php

namespace Micro\BaseServiceBundle\Services\API;

class ConfigurationService {
    /**
     *
     * @var array
     */
    private $configuration;
    
    function __construct(array $configuration) {
        $this->configuration = $configuration;
    }
    
    public function getConfiguration()
    {
        return $this->configuration;
    }

}
