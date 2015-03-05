<?php

namespace Itkg\ConsumerBundle\Document;

use Itkg\ConsumerBundle\Model\ClientConfig as BaseClientConfig;

/**
 * Class ClientConfig
 *
 * @ODM\Document(
 *   collection="client_config",
 *   repositoryClass="Itkg\ConsumerBundle\Repository\ClientConfigRepository"
 * )
 */
class ClientConfig extends BaseClientConfig
{
    /**
     * @var string $id
     *
     * @ODM\Id
     */
    protected $id;

    /**
     * @var string
     *
     * @ODM\Field(type="string")
     */
    protected $proxyHost;

    /**
     * @var string
     *
     * @ODM\Field(type="string")
     */
    protected $proxyPort;

    /**
     * @var string
     *
     * @ODM\Field(type="string")
     */
    protected $proxyLogin;

    /**
     * @var string
     *
     * @ODM\Field(type="string")
     */
    protected $proxyPassword;

    /**
     * @var string
     *
     * @ODM\Field(type="string")
     */
    protected $login;

    /**
     * @var string
     *
     * @ODM\Field(type="string")
     */
    protected $password;
}
