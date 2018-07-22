<?php


namespace Xervice\Kernel;


use Xervice\Core\Facade\AbstractFacade;

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
}
