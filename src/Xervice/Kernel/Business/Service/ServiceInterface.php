<?php


namespace Xervice\Kernel\Business\Service;


interface ServiceInterface
{
    /**
     * @param \Xervice\Kernel\Business\Service\ServiceProviderInterface $serviceProvider
     */
    public function boot(ServiceProviderInterface $serviceProvider): void;

    /**
     * @param \Xervice\Kernel\Business\Service\ServiceProviderInterface $serviceProvider
     */
    public function execute(ServiceProviderInterface $serviceProvider): void;
}