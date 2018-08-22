<?php


namespace XerviceTest\Kernel\Service;



use Xervice\Kernel\Business\Model\Service\ServiceProviderInterface;
use Xervice\Kernel\Business\Plugin\BootInterface;
use Xervice\Kernel\Business\Plugin\ExecuteInterface;

class TestService implements BootInterface, ExecuteInterface
{
    /**
     * @var string
     */
    public $test;

    /**
     * @param \Xervice\Kernel\Business\Model\Service\ServiceProviderInterface $serviceProvider
     */
    public function boot(ServiceProviderInterface $serviceProvider): void
    {
        $this->test = 'test';
    }

    /**
     * @param \Xervice\Kernel\Business\Model\Service\ServiceProviderInterface $serviceProvider
     */
    public function execute(ServiceProviderInterface $serviceProvider): void
    {
        $this->test = 'test.test';
    }

}