<?php


namespace Xervice\Kernel\Business\Model\Service;



use Xervice\Kernel\Business\Plugin\BootInterface;
use Xervice\Kernel\Business\Plugin\ClearServiceInterface;
use Xervice\Kernel\Business\Plugin\ExecuteInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @var \Xervice\Kernel\Business\Model\Service\ServiceInterface[]
     */
    private $serviceCollection;

    /**
     * ServiceProvider constructor.
     *
     * @param array $serviceCollection
     */
    public function __construct(array $serviceCollection)
    {
        $this->serviceCollection = [];

        foreach ($serviceCollection as $name => $service) {
            $this->set($name, new $service());
        }
    }

    public function boot(): void
    {
        foreach ($this->serviceCollection as $service) {
            if ($service instanceof BootInterface) {
                $service->boot($this);
            }
        }
    }

    public function execute(): void
    {
        foreach ($this->serviceCollection as $service) {
            if ($service instanceof ExecuteInterface) {
                $service->execute($this);
            }
        }
    }

    /**
     * @param string $serviceName
     *
     * @return null|\Xervice\Kernel\Business\Plugin\ClearServiceInterface
     */
    public function get(string $serviceName): ?ClearServiceInterface
    {
        return $this->serviceCollection[$serviceName] ?? null;
    }

    /**
     * @param string $serviceName
     * @param \Xervice\Kernel\Business\Plugin\ClearServiceInterface $service
     */
    public function set(string $serviceName, ClearServiceInterface $service): void
    {
        $this->serviceCollection[$serviceName] = $service;
    }
}