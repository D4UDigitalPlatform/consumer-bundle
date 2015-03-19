<?php

namespace Itkg\ConsumerBundle\Manager;

use Doctrine\Common\Collections\ArrayCollection;
use Itkg\Consumer\Service\Service;
use Itkg\ConsumerBundle\Model\ServiceConfig;
use Itkg\ConsumerBundle\Repository\ServiceConfigRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @var string
     */
    protected $serviceConfigClass;

    /**
     * @var string
     */
    protected $clientConfigClass;

    /**
     * @param ServiceConfigRepositoryInterface $repository
     * @param string $serviceConfigClass
     * @param string $clientConfigClass
     */
    public function __construct(ServiceConfigRepositoryInterface $repository, $serviceConfigClass, $clientConfigClass)
    {
        $this->services = new ArrayCollection();
        $this->repository = $repository;
        $this->serviceConfigClass = $serviceConfigClass;
        $this->clientConfigClass = $clientConfigClass;
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
     * @param ServiceConfig $serviceConfig
     */
    public function updateServiceConfig(ServiceConfig $serviceConfig)
    {
        $this->repository->update($serviceConfig);
    }

    /**
     * Find a service by key
     *
     * @param string $key
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return \Itkg\Consumer\Service\Service
     */
    public function findService($key)
    {
        foreach ($this->services as $service) {
            /** @var Service $service */
            if ($service->getIdentifier() === $key) {
                return $service;
            }
        }

        throw new NotFoundHttpException(
            sprintf('service %s does not exist', $key)
        );
    }

    /**
     * @param string $key
     *
     * @return \Itkg\ConsumerBundle\Document\ServiceConfig
     */
    public function findServiceConfig($key)
    {
        $config = $this->repository->findOneByServiceKey($key);

        if (null === $config) {
            $service = $this->findService($key);
            $config = $this->createNewServiceConfig();

            $config->fromOptions($service->getOptions());
            $config->getClientConfig()->fromOptions($service->getClient()->getNormalizedOptions());
            $config->setServiceKey($key);
        }

        return $config;
    }

    /**
     * @return ServiceConfig
     */
    public function createNewServiceConfig()
    {
        $serviceConfigClass = $this->serviceConfigClass;
        $clientConfigClass  = $this->clientConfigClass;
        /** @var ServiceConfig $serviceConfig */
        $serviceConfig = new $serviceConfigClass;

        return $serviceConfig->setClientConfig(new $clientConfigClass());
    }
}
