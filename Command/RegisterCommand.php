<?php

namespace Micro\BaseServiceBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RegisterCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('micro:service:register')
                ->setDescription('Registers microservice host');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $config = $this->getContainer()->get('configuration_api')->getConfiguration();
        $registerService = $this->getContainer()->get('register_api');
        $result = $registerService->register(json_encode($config));
        $output->writeln($result);
    }

}
