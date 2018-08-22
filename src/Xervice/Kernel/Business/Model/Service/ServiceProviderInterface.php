<?php

namespace Xervice\Kernel\Business\Model\Service;

use Xervice\Kernel\Business\Plugin\ClearServiceInterface;

interface ServiceProviderInterface
{
    public function boot(): void;

    public function execute(): void;

    /**
     * @param string $serviceName
     *
     * @return null|\Xervice\Kernel\Business\Plugin\ClearServiceInterface
     */
    public function get(string $serviceName): ?ClearServiceInterface;

    /**
     * @param string $serviceName
     * @param \Xervice\Kernel\Business\Plugin\ClearServiceInterface $service
     */
    public function set(string $serviceName, ClearServiceInterface $service): void;
}