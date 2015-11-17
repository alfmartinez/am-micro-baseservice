<?php

namespace Micro\BaseServiceBundle\Tests\Command;

use Micro\BaseServiceBundle\Command\RegisterCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ListCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $application = new Application();
        $application->add(new RegisterCommand());

        $command = $application->find('micro:service:register');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array('command' => $command->getName()));

        $this->assertRegExp('/.../', $commandTester->getDisplay());

    }
}
