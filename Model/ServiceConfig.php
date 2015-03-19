<?php

namespace Itkg\ConsumerBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

abstract class ServiceConfig
{
    /**
     * @var string
     */
    protected $serviceKey;

    /**
     * @var string
     */
    protected $responseType;

    /**
     * @var string
     */
    protected $responseFormat;

    /**
     * @var string
     */
    protected $cacheTtl;

    /**
     * @var ClientConfig
     */
    protected $clientConfig;

    /**
     * @var bool
     */
    protected $disabled = false;



    /**
     * Array representation of service config
     *
     * @return array
     */
    public function toOptions()
    {
        return array(
            'response_type'   => $this->responseType,
            'response_format' => $this->responseFormat,
            'cache_ttl'       => $this->cacheTtl,
            'disabled'        => $this->disabled,
            'identifier'      => $this->serviceKey
        );
    }

    /**
     * @param array $options
     *
     * @return $this
     */
    public function fromOptions(array $options)
    {
        $this->responseFormat = $options['response_format'];
        $this->responseType = $options['response_type'];
        $this->cacheTtl = $options['cache_ttl'];
        $this->disabled = $options['disabled'];

        return $this;
    }

    /**
     * @return bool
     */
    public function isDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param bool $disabled
     *
     * @return $this
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * @param string $serviceKey
     *
     * @return $this
     */
    public function setServiceKey($serviceKey)
    {
        $this->serviceKey = $serviceKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getServiceKey()
    {
        return $this->serviceKey;
    }

    /**
     * @param \Itkg\ConsumerBundle\Model\ClientConfig $clientConfig
     *
     * @return $this
     */
    public function setClientConfig($clientConfig)
    {
        $this->clientConfig = $clientConfig;

        return $this;
    }

    /**
     * @return \Itkg\ConsumerBundle\Model\ClientConfig
     */
    public function getClientConfig()
    {
        return $this->clientConfig;
    }


    /**
     * @param string $cacheTtl
     *
     * @return $this
     */
    public function setCacheTtl($cacheTtl)
    {
        $this->cacheTtl = $cacheTtl;

        return $this;
    }

    /**
     * @return string
     */
    public function getCacheTtl()
    {
        return $this->cacheTtl;
    }

    /**
     * @param string $responseFormat
     *
     * @return $this
     */
    public function setResponseFormat($responseFormat)
    {
        $this->responseFormat = $responseFormat;

        return $this;
    }

    /**
     * @return string
     */
    public function getResponseFormat()
    {
        return $this->responseFormat;
    }

    /**
     * @param string $responseType
     *
     * @return $this
     */
    public function setResponseType($responseType)
    {
        $this->responseType = $responseType;

        return $this;
    }

    /**
     * @return string
     */
    public function getResponseType()
    {
        return $this->responseType;
    }
}
