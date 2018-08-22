<?php

namespace Xervice\Kernel\Business;

use Xervice\Core\Business\Model\Facade\AbstractFacade;
use Xervice\Kernel\Business\Plugin\ClearServiceInterface;

/**
 * @method \Xervice\Kernel\Business\KernelBusinessFactory getFactory()
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
     * @return \Xervice\Kernel\Business\Plugin\ClearServiceInterface
     */
    public function getService(string $serviceName): ClearServiceInterface
    {
        return $this->getFactory()->getServiceProvider()->get($serviceName);
    }
}
