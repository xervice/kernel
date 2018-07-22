<?php


namespace Xervice\Kernel\Business\Service;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @var \Xervice\Kernel\Business\Service\ServiceInterface[]
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
            $service->boot($this);
        }
    }

    public function execute(): void
    {
        foreach ($this->serviceCollection as $service) {
            $service->execute($this);
        }
    }

    /**
     * @param string $serviceName
     *
     * @return null|\Xervice\Kernel\Business\Service\ServiceInterface
     */
    public function get(string $serviceName): ?ServiceInterface
    {
        return $this->serviceCollection[$serviceName] ?? null;
    }

    /**
     * @param string $serviceName
     * @param \Xervice\Kernel\Business\Service\ServiceInterface $service
     */
    public function set(string $serviceName, ServiceInterface $service): void
    {
        $this->serviceCollection[$serviceName] = $service;
    }
}