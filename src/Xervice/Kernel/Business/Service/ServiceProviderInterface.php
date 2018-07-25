<?php

namespace Xervice\Kernel\Business\Service;

interface ServiceProviderInterface
{
    public function boot(): void;

    public function execute(): void;

    /**
     * @param string $serviceName
     *
     * @return null|\Xervice\Kernel\Business\Service\ClearServiceInterface
     */
    public function get(string $serviceName): ?ClearServiceInterface;

    /**
     * @param string $serviceName
     * @param \Xervice\Kernel\Business\Service\ClearServiceInterface $service
     */
    public function set(string $serviceName, ClearServiceInterface $service): void;
}