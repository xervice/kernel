<?php


namespace Xervice\Kernel\Business;


use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;
use Xervice\Kernel\Business\Model\Service\ServiceProvider;
use Xervice\Kernel\Business\Model\Service\ServiceProviderInterface;
use Xervice\Kernel\KernelDependencyProvider;

class KernelBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @var ServiceProviderInterface
     */
    private $serviceProvider;

    /**
     * @return \Xervice\Kernel\Business\Model\Service\ServiceProviderInterface
     */
    public function createServiceProvider(): ServiceProviderInterface
    {
        return new ServiceProvider(
            $this->getServiceList()
        );
    }

    /**
     * @return \Xervice\Kernel\Business\Model\Service\ServiceProviderInterface
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