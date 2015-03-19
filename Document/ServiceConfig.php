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
     * @ODM\Field(type="string", nullable=false)
     */
    protected $serviceKey;

    /**
     * @var string
     *
     * @ODM\Field(type="string", nullable=false)
     */
    protected $responseType;

    /**
     * @var string
     *
     * @ODM\Field(type="string", nullable=false)
     */
    protected $responseFormat;

    /**
     * @var string
     *
     * @ODM\Field(type="int", nullable=true)
     */
    protected $cacheTtl;

    /**
     * @var ClientConfig
     *
     * @ODM\EmbedOne(targetDocument="ClientConfig")
     */
    protected $clientConfig;

    /**
     * @var bool
     *
     * @ODM\Field(type="boolean")
     */
    protected $disabled = false;
}
