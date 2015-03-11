<?php

namespace Itkg\ConsumerBundle\Manager;

use Doctrine\Common\Collections\ArrayCollection;
use Itkg\Consumer\Service\Service;
use Itkg\ConsumerBundle\Model\ServiceConfig;

/**
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
interface ServiceManagerInterface
{
    /**
     * @param Service $service
     *
     * @return $this
     */
    public function addService(Service $service);

    /**
     * @return ArrayCollection
     */
    public function findServices();

    /**
     * @param ServiceConfig $service
     */
    public function updateServiceConfig(ServiceConfig $service);

    /**
     * @param string $key
     *
     * @return Service
     */
    public function findService($key);

    /**
     * @param $key
     *
     * @return ServiceConfig
     */
    public function findServiceConfig($key);

    /**
     * @return ServiceConfig
     */
    public function createNewServiceConfig();
}
