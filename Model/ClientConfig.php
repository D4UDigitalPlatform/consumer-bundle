<?php

namespace Itkg\ConsumerBundle\Model;

abstract class ClientConfig
{
    /**
     * @var string
     */
    protected $proxyHost;

    /**
     * @var string
     */
    protected $proxyPort;

    /**
     * @var string
     */
    protected $proxyLogin;

    /**
     * @var string
     */
    protected $proxyPassword;

    /**
     * @var string
     */
    protected $authLogin;

    /**
     * @var string
     */
    protected $authPassword;

    /**
     * @var int
     */
    protected $timeout;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * Array representation of service config
     *
     * @return array
     */
    public function toOptions()
    {
        return array(
            'auth_login'     => $this->authLogin,
            'auth_password'  => $this->authPassword,
            'proxy_host'     => $this->proxyHost,
            'proxy_port'     => $this->proxyPort,
            'proxy_login'    => $this->proxyLogin,
            'proxy_password' => $this->proxyPassword,
            'timeout'        => $this->timeout,
            'base_url'       => $this->baseUrl
        );
    }

    /**
     * @param array $options
     *
     * @return $this
     */
    public function fromOptions(array $options)
    {
        $this->authLogin     = $options['auth_login'];
        $this->authPassword  = $options['auth_password'];
        $this->proxyHost     = $options['proxy_host'];
        $this->proxyPort     = $options['proxy_port'];
        $this->proxyLogin    = $options['proxy_login'];
        $this->proxyPassword = $options['proxy_password'];
        $this->timeout       = $options['timeout'];
        $this->baseUrl       = $options['base_url'];

        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     *
     * @return $this
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }
    /**
     * @param string $authLogin
     *
     * @return $this
     */
    public function setAuthLogin($authLogin)
    {
        $this->authLogin = $authLogin;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthLogin()
    {
        return $this->authLogin;
    }

    /**
     * @param string $authPassword
     *
     * @return $this
     */
    public function setAuthPassword($authPassword)
    {
        $this->authPassword = $authPassword;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->authPassword;
    }


    /**
     * @param string $proxyHost
     *
     * @return $this
     */
    public function setProxyHost($proxyHost)
    {
        $this->proxyHost = $proxyHost;

        return $this;
    }

    /**
     * @return string
     */
    public function getProxyHost()
    {
        return $this->proxyHost;
    }

    /**
     * @param string $proxyLogin
     *
     * @return $this
     */
    public function setProxyLogin($proxyLogin)
    {
        $this->proxyLogin = $proxyLogin;

        return $this;
    }

    /**
     * @return string
     */
    public function getProxyLogin()
    {
        return $this->proxyLogin;
    }

    /**
     * @param string $proxyPassword
     *
     * @return $this
     */
    public function setProxyPassword($proxyPassword)
    {
        $this->proxyPassword = $proxyPassword;

        return $this;
    }

    /**
     * @return string
     */
    public function getProxyPassword()
    {
        return $this->proxyPassword;
    }

    /**
     * @param string $proxyPort
     *
     * @return $this
     */
    public function setProxyPort($proxyPort)
    {
        $this->proxyPort = $proxyPort;

        return $this;
    }

    /**
     * @return string
     */
    public function getProxyPort()
    {
        return $this->proxyPort;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param $timeout
     *
     * @return $this
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }
}
