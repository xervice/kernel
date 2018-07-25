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