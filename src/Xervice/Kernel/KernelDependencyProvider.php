<?php

namespace Xervice\Kernel;

use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;


class KernelDependencyProvider extends AbstractDependencyProvider
{
    public const SERVICES = 'services';

    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container[self::SERVICES] = function () {
            return $this->getServiceList();
        };

        return $container;
    }

    /**
     * Service classes with key as service name
     * e.g.
     * myService => myservice::class
     *
     * @return array
     */
    protected function getServiceList(): array
    {
        return [];
    }
}