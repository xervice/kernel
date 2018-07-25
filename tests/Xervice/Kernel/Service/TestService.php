<?php


namespace XerviceTest\Kernel\Service;


use Xervice\Kernel\Business\Service\BootInterface;
use Xervice\Kernel\Business\Service\ExecuteInterface;
use Xervice\Kernel\Business\Service\ServiceProviderInterface;

class TestService implements BootInterface, ExecuteInterface
{
    /**
     * @var string
     */
    public $test;

    public function boot(ServiceProviderInterface $serviceProvider): void
    {
        $this->test = 'test';
    }

    public function execute(ServiceProviderInterface $serviceProvider): void
    {
        $this->test = 'test.test';
    }

}