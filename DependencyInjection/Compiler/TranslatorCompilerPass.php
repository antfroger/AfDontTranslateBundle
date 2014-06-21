<?php

/*
 * This file is part of the AfDontTranslateBundle package
 *
 * (c) Antoine Froger <antfroger@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Af\Bundle\DontTranslateBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class TranslatorCompilerPass
 * @package Af\Bundle\DontTranslateBundle\DependencyInjection\Compiler
 *
 * @author Antoine Froger <antfroger@gmail.com>
 */
class TranslatorCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('translator.default')) {
            return;
        }

        // Saves the translator.default service under another name
        $container->setDefinition(
            'translator.main',
            $container->getDefinition('translator.default')
        );

        // Overrides the translator.default service by the AfDontTranslate Translator
        // and injects it the previous translator.default service
        $container->setDefinition('translator.default', new Definition(
            'Af\Bundle\DontTranslateBundle\Translation\Translator',
            array(new Reference('translator.main'))
        ));
    }
}
