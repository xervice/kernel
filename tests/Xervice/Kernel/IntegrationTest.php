<?php
namespace XerviceTest\Kernel;

use Xervice\Core\Business\Model\Locator\Dynamic\Business\DynamicBusinessLocator;

require_once __DIR__ . '/TestInjector/KernelDependencyProvider.php';

/**
 * @method \Xervice\Kernel\Business\KernelFacade getFacade()
 * @method \Xervice\Kernel\Business\KernelBusinessFactory getFactory()
 */
class IntegrationTest extends \Codeception\Test\Unit
{
    use DynamicBusinessLocator;

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