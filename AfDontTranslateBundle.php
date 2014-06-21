<?php

/*
 * This file is part of the AfDontTranslateBundle package
 *
 * (c) Antoine Froger <antfroger@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Af\Bundle\DontTranslateBundle;

use Af\Bundle\DontTranslateBundle\DependencyInjection\Compiler\TranslatorCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AfDontTranslateBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new TranslatorCompilerPass());
    }
}
