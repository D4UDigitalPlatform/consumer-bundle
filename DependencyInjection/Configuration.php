<?php

namespace Itkg\ConsumerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('itkg_consumer');

        $rootNode->children()
            ->arrayNode('subscriber')
                ->children()
                    ->arrayNode('cache')
                        ->children()
                            ->scalarNode('class')->end()
                        ->end()
                    ->end()
                    ->arrayNode('logger')
                        ->children()
                            ->scalarNode('class')->end()
                        ->end()
                    ->end()
                    ->arrayNode('deserializer')
                        ->children()
                            ->scalarNode('class')->end()
                        ->end()
                    ->end()
                    ->arrayNode('authentication')
                        ->children()
                            ->scalarNode('class')->end()
                        ->end()
                    ->end()
                    ->arrayNode('access')
                        ->children()
                             ->scalarNode('class')->end()
                        ->end()
                    ->end()
                    ->arrayNode('config')
                        ->children()
                            ->scalarNode('class')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}