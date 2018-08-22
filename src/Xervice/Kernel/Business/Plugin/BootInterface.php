<?php


namespace Xervice\Kernel\Business\Plugin;


use Xervice\Kernel\Business\Model\Service\ServiceProviderInterface;

interface BootInterface extends ClearServiceInterface
{
    /**
     * @param \Xervice\Kernel\Business\Model\Service\ServiceProviderInterface $serviceProvider
     */
    public function boot(ServiceProviderInterface $serviceProvider): void;
}