<?php

/*
 * This file is part of the AfDontTranslateBundle package
 *
 * (c) Antoine Froger <antfroger@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */
namespace Af\Bundle\DontTranslateBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('af_dont_translate');

        $rootNode
            ->children()
                ->scalarNode('mode')
                    ->info('The mode that activates the don\'t translate mode')
                    ->defaultValue('get')
                ->end()
                ->scalarNode('param_name')
                    ->info('The parameter name activating the don\'t translate mode')
                    ->defaultValue('untranslate')
                ->end()
                ->arrayNode('roles')
                    ->info('Authorized roles list')
                    ->example('ROLE_TRANSLATOR or [ROLE_TRANSLATOR, ROLE_ADMIN]')
                    ->prototype('scalar')
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
