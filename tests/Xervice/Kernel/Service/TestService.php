<?php


namespace XerviceTest\Kernel\Service;


use Xervice\Kernel\Business\Service\ServiceInterface;
use Xervice\Kernel\Business\Service\ServiceProviderInterface;

class TestService implements ServiceInterface
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