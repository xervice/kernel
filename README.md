Xervice: Kernel
=====================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/xervice/kernel/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/xervice/kernel/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/xervice/kernel/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/xervice/kernel/?branch=master)

Kernel for application extending via services.


Installation
----------------
```
composer require xervice/kernel
```

Configuration
---------------

You can add your services to the kernel with extending the dependency provider in your application.

```php
<?php

namespace App\Kernel;

use Xervice\Kernel\KernelDependencyProvider as XerviceKernelDependencyProvider;
use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;

class KernelDependencyProvider extends XerviceKernelDependencyProvider
{
    /**
     * Service classes with key as service name
     * e.g.
     * myService => myservice::class
     *
     * @return array
     */
    protected function getServiceList(): array
    {
        return [
            'routing' => MyRoutingService::class
        ];
    }
}
```

Usage
-----------
You can use the kernel to initiate a application and run all dependend boot procedures.

```php
use Xervice\Core\Locator\Locator;


$locator = Locator::getInstance();
$kernel = $locator->kernel()->facade();

try {
    $kernel->boot();
    $kernel->run();
} catch (\Exception $e) {
    $locator->exceptionHandler()->facade()->handleException($e);
}
```

Own services
----------------
To create an own service you have to implement the ServiceInterface.

***Example***
```php
<?php

namespace App\MyModule\Business\Kernel;

use Xervice\Core\Locator\AbstractWithLocator;
use Xervice\Kernel\Business\Service\ServiceInterface;
use Xervice\Kernel\Business\Service\ServiceProviderInterface;

/**
 * @method \App\MyModule\MyModuleFacade getFacade()
 */
class MyService extends AbstractWithLocator implements ServiceInterface
{
    /**
     * @param \Xervice\Kernel\Business\Service\ServiceProviderInterface $serviceProvider
     *
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    public function boot(ServiceProviderInterface $serviceProvider): void
    {
        $this->getFacade()->initMyModule();
    }

    /**
     * @param \Xervice\Kernel\Business\Service\ServiceProviderInterface $serviceProvider
     *
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    public function execute(ServiceProviderInterface $serviceProvider): void
    {
        $this->getFacade()->runMyModule();
    }
}
```