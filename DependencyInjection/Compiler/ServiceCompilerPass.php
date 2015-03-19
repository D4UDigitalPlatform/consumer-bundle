<?php

namespace Itkg\ConsumerBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;


/**
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ServiceCompilerPass implements CompilerPassInterface
{

    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        $services = $container->findTaggedServiceIds('itkg_consumer.service');
        $definition = $container->getDefinition('itkg_consumer.manager.service');
        foreach (array_keys($services) as $id) {
            // Add test to the test manager
            $definition->addMethodCall(
                'addService',
                array(new Reference($id))
            );
        }
    }
}
