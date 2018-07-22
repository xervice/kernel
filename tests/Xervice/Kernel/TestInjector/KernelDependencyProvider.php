<?php


namespace App\Kernel;


use Xervice\Kernel\KernelDependencyProvider as XerviceKernelDependencyProvider;
use XerviceTest\Kernel\Service\TestService;

class KernelDependencyProvider extends XerviceKernelDependencyProvider
{
    /**
     * @return array
     */
    protected function getServiceList(): array
    {
        return [
            'test' => TestService::class
        ];
    }

}