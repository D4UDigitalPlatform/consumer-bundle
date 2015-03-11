<?php

namespace Itkg\ConsumerBundle\Document;

use Itkg\ConsumerBundle\Model\ServiceConfig as BaseServiceConfig;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Class ServiceConfig
 *
 * @ODM\Document(repositoryClass="Itkg\ConsumerBundle\Repository\ServiceConfigRepository")
 *
 */
class ServiceConfig extends BaseServiceConfig
{
    /**
     * @ODM\Id
     *
     * @var string
     */
    protected $id;

    /**
     * @var string
     *
     * @ODM\Field(type="string")
     */
    protected $serviceKey;

    /**
     * @var string
     *
     * @ODM\Field(type="string")
     */
    protected $responseType;

    /**
     * @var string
     *
     * @ODM\Field(type="string")
     */
    protected $responseFormat;

    /**
     * @var string
     *
     * @ODM\Field(type="int")
     */
    protected $cacheTtl;

    /**
     * @var ClientConfig
     *
     * @ODM\EmbedOne(targetDocument="ClientConfig")
     */
    protected $clientConfig;
}
