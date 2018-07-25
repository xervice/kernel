<?php


namespace Xervice\Kernel\Business\Service;


interface ExecuteInterface extends ClearServiceInterface
{
    /**
     * @param \Xervice\Kernel\Business\Service\ServiceProviderInterface $serviceProvider
     */
    public function execute(ServiceProviderInterface $serviceProvider): void;
}