<?php


namespace Xervice\Kernel\Business\Service;


interface BootInterface extends ClearServiceInterface
{
    /**
     * @param \Xervice\Kernel\Business\Service\ServiceProviderInterface $serviceProvider
     */
    public function boot(ServiceProviderInterface $serviceProvider): void;
}