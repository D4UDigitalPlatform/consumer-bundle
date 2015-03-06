<?php

namespace Itkg\ConsumerBundle\Manager;

use Doctrine\Common\Collections\ArrayCollection;
use Itkg\Consumer\Service\Service;
use Itkg\ConsumerBundle\Repository\ServiceConfigRepositoryInterface;

/**
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ServiceManager implements ServiceManagerInterface
{
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $services;

    /**
     * @var ServiceConfigRepositoryInterface
     */
    protected $repository;
    /**
     * Constructor
     */
    public function __construct(ServiceConfigRepositoryInterface $repository)
    {
        $this->services = new ArrayCollection();
        $this->repository = $repository;
    }

    /**
     * @param Service $service
     *
     * @return $this
     */
    public function addService(Service $service)
    {
        $this->services->add($service);

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findServices()
    {
        return $this->services;
    }

    /**
     * @param Service $service
     */
    public function updateService(Service $service)
    {
        // TODO: Implement updateService() method.
    }

    /**
     * Find a service by key
     *
     * @param string $key
     *
     * @return \Itkg\Consumer\Service\Service|null
     */
    public function findService($key)
    {
        return $this->services->filter(
            function(Service $service) use ($key)  {
                if ($service->getIdentifier() == $key) {
                    return $service;
                }
            }
        );
    }
}
