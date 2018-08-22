<?php


namespace Xervice\Kernel\Business\Plugin;


use Xervice\Kernel\Business\Model\Service\ServiceProviderInterface;

interface ExecuteInterface extends ClearServiceInterface
{
    /**
     * @param \Xervice\Kernel\Business\Model\Service\ServiceProviderInterface $serviceProvider
     */
    public function execute(ServiceProviderInterface $serviceProvider): void;
}