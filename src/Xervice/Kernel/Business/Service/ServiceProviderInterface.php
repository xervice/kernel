<?php

namespace Xervice\Kernel\Business\Service;

interface ServiceProviderInterface
{
    public function boot(): void;

    public function execute(): void;

    /**
     * @param string $serviceName
     *
     * @return null|\Xervice\Kernel\Business\Service\ServiceInterface
     */
    public function get(string $serviceName): ?ServiceInterface;

    /**
     * @param string $serviceName
     * @param \Xervice\Kernel\Business\Service\ServiceInterface $service
     */
    public function set(string $serviceName, ServiceInterface $service): void;
}