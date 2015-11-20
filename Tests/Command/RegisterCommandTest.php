<?php

namespace Micro\BaseServiceBundle\Tests\Command;

use Micro\BaseServiceBundle\Command\RegisterCommand;
use Mockery as m;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class RegisterCommandTest extends WebTestCase {

    /**
     * @test
     * @dataProvider registerCases
     */
    public function executeRegistersService($return, $config) {
        $appKernel = $this->createKernel();
        $appKernel->boot();

        $application = new Application($appKernel);
        $application->add(new RegisterCommand());

        $this->mockRestful($return, $config);

        $command = $application->find('micro:service:register');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array('command' => $command->getName()));
        $this->assertEquals("Registration OK".PHP_EOL, $commandTester->getDisplay());
    }

    public function registerCases() {
        return [
            'OK' => [(object) ["body" => "Registration OK"],json_encode(["name"=>"Test"])]
        ];
    }

    private function mockRestful($return, $config) {
        $mock = m::mock('alias:Httpful\Request');

        $mock
                ->shouldReceive('put')
                ->with('http://test.example.com/api/services/Test/provider', $config)
                ->andReturnSelf();

        $mock
                ->shouldReceive('send')
                ->andReturn($return);
    }

}
