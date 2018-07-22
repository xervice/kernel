<?php
namespace XerviceTest\Kernel;

use Xervice\Core\Locator\Dynamic\DynamicLocator;

require_once __DIR__ . '/TestInjector/KernelDependencyProvider.php';

/**
 * @method \Xervice\Kernel\KernelFacade getFacade()
 * @method \Xervice\Kernel\KernelFactory getFactory()
 */
class IntegrationTest extends \Codeception\Test\Unit
{
    use DynamicLocator;

    /**
     * @group Xervice
     * @group Kernel
     * @group Integration
     */
    public function testKernel()
    {
        $this->getFacade()->boot();
        $this->getFacade()->run();

        $this->assertEquals(
            'test.test',
            $this->getFactory()->getServiceProvider()->get('test')->test
        );
    }
}