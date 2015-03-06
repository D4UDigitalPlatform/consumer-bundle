<?php

namespace Itkg\ConsumerBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class ItkgConsumerExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @param array $configs An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     *
     * @api
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $loader->load('subscriber.yml');
        $loader->load('repository.yml');
        $loader->load('manager.yml');
        $loader->load('form.yml');
        $loader->load('model.yml');

        if (isset($config['subscriber'])) {

            /* Override subscribers class */
            foreach ($config['subscriber'] as $key => $value) {
                $container->setParameter(
                    sprintf('itkg_consumer.subscriber.%s.class', $key),
                    $value['class']
                );
            }
        }
    }
}
