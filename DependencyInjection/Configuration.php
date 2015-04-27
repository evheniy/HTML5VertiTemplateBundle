<?php

namespace Evheniy\HTML5VertiTemplateBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Evheniy\HTML5VertiTemplateBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('html5_verti_template');
        $rootNode
            ->children()
                ->scalarNode('cdn')->defaultValue('')->end()
            ->end();

        return $treeBuilder;
    }
}