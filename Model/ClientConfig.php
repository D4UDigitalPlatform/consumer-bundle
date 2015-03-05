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
    protected $login;

    /**
     * @var string
     */
    protected $password;

    /**
     * Array representation of service config
     *
     * @return array
     */
    public function toOptions()
    {
        return array(
            'login'          => $this->login,
            'password'       => $this->password,
            'proxy_host'     => $this->proxyHost,
            'proxy_port'     => $this->proxyPort,
            'proxy_login'    => $this->proxyLogin,
            'proxy_password' => $this->proxyPassword
        );
    }

    /**
     * @param string $login
     *
     * @return $this
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
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


}
