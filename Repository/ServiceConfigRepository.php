<?php

namespace Itkg\ConsumerBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Itkg\ConsumerBundle\Document\ServiceConfig;

/**
 * Class ServiceConfigRepository
 * @package Itkg\ConsumerBundle\Repository
 */
class ServiceConfigRepository extends DocumentRepository implements ServiceConfigRepositoryInterface
{
    /**
     * Find a service config for by a service key
     *
     * @param string $serviceKey
     *
     * @return ServiceConfig|null
     */
    public function findOneByServiceKey($serviceKey)
    {
        return $this->findOneBy(array('serviceKey' => $serviceKey));
    }
}
