<?php


namespace Xervice\Kernel;


use Xervice\Core\Factory\AbstractFactory;
use Xervice\Kernel\Business\Service\ServiceProvider;
use Xervice\Kernel\Business\Service\ServiceProviderInterface;

class KernelFactory extends AbstractFactory
{
    /**
     * @var ServiceProviderInterface
     */
    private $serviceProvider;

    /**
     * @return \Xervice\Kernel\Business\Service\ServiceProviderInterface
     */
    public function createServiceProvider(): ServiceProviderInterface
    {
        return new ServiceProvider(
            $this->getServiceList()
        );
    }

    /**
     * @return \Xervice\Kernel\Business\Service\ServiceProviderInterface
     */
    public function getServiceProvider(): ServiceProviderInterface
    {
        if ($this->serviceProvider === null) {
            $this->serviceProvider = $this->createServiceProvider();
        }

        return $this->serviceProvider;
    }

    /**
     * @return array
     */
    public function getServiceList(): array
    {
        return $this->getDependency(KernelDependencyProvider::SERVICES);
    }
}