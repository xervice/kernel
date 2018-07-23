<?php


namespace Xervice\Kernel;


use Xervice\Core\Facade\AbstractFacade;
use Xervice\Kernel\Business\Service\ServiceInterface;
use Xervice\Kernel\Business\Service\ServiceProviderInterface;

/**
 * @method \Xervice\Kernel\KernelFactory getFactory()
 */
class KernelFacade extends AbstractFacade
{
    public function boot(): void
    {
        $this->getFactory()->getServiceProvider()->boot();
    }

    public function run(): void
    {
        $this->getFactory()->getServiceProvider()->execute();
    }

    /**
     * @param string $serviceName
     *
     * @return \Xervice\Kernel\Business\Service\ServiceInterface
     */
    public function getService(string $serviceName): ServiceInterface
    {
        return $this->getFactory()->getServiceProvider()->get($serviceName);
    }
}
