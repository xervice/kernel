<?php


namespace Xervice\Kernel;


use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;

/**
 * @method \Xervice\Core\Locator\Locator getLocator()
 */
class KernelDependencyProvider extends AbstractProvider
{
    public const SERVICES = 'services';

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $dependencyProvider
     */
    public function handleDependencies(DependencyProviderInterface $dependencyProvider): void
    {
        $dependencyProvider[self::SERVICES] = function () {
            return $this->getServiceList();
        };
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