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
        $name = 'Sweetie';
        if ($name) {
            $text = 'Hello ' . $name;
        } else {
            $text = 'Hello';
        }

        $output->writeln($text);
    }

}
