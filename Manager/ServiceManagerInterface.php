<?php

namespace Itkg\ConsumerBundle\Manager;

use Doctrine\Common\Collections\ArrayCollection;
use Itkg\Consumer\Service\Service;

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
     * @param Service $service
     */
    public function updateService(Service $service);

    /**
     * @param string $key
     *
     * @return Service
     */
    public function findService($key);
}
