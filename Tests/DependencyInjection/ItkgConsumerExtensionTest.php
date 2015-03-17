<?php

namespace Itkg\ConsumerBundle\Tests\DependencyInjection;

use Itkg\ConsumerBundle\DependencyInjection\ItkgConsumerExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Yaml\Parser;

class ItkgConsumerExtensionTest extends \PHPUnit_Framework_TestCase
{
    private $container;

    public function testLoadSubscribers()
    {
        $this->loadContainer();
        $this->assertEquals('MyCacheListener', $this->container->getParameter('itkg_consumer.subscriber.cache.class'));
        $this->assertEquals('MyLoggerListener', $this->container->getParameter('itkg_consumer.subscriber.logger.class'));
        $this->assertEquals('MyDeserializerListener', $this->container->getParameter('itkg_consumer.subscriber.deserializer.class'));
        $this->assertEquals('MyAuthenticationListener', $this->container->getParameter('itkg_consumer.subscriber.authentication.class'));
        $this->assertEquals('MyAccessListener', $this->container->getParameter('itkg_consumer.subscriber.access.class'));
        $this->assertEquals('MyConfigListener', $this->container->getParameter('itkg_consumer.subscriber.config.class'));
    }

    protected function loadContainer()
    {
        $this->container= new ContainerBuilder();
        $loader = new ItkgConsumerExtension();
        $config = $this->getConfig();
        $loader->load(array($config), $this->container);
    }

    /**
     * getConfig
     *
     * @return array
     */
    protected function getConfig()
    {
        $yaml = <<<EOF
subscriber:
    cache:
        class: MyCacheListener
    logger:
        class: MyLoggerListener
    deserializer:
        class: MyDeserializerListener
    authentication:
        class: MyAuthenticationListener
    access:
        class: MyAccessListener
    config:
        class: MyConfigListener

EOF;
        $parser = new Parser();
        return $parser->parse($yaml);
    }
}
