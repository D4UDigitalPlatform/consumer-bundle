<?php

namespace Itkg\ConsumerBundle\Repository;

use Itkg\ConsumerBundle\Model\ServiceConfig;

interface ServiceConfigRepositoryInterface
{
    /**
     * Find a service config for by a service key
     *
     * @param string $serviceKey
     *
     * @return ServiceConfig|null
     */
    public function findOneByServiceKey($serviceKey);

    /**
     * @param ServiceConfig $serviceConfig
     */
    public function update(ServiceConfig $serviceConfig);
}
