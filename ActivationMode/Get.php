<?php

/*
 * This file is part of the AfDontTranslateBundle package
 *
 * (c) Antoine Froger <antfroger@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Af\Bundle\DontTranslateBundle\ActivationMode;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class Get
 *
 * @package Af\Bundle\DontTranslateBundle\ActivationMode
 *
 * @author  Antoine Froger <antfroger@gmail.com>
 */
class Get implements ActivationModeInterface
{
    /**
     * {@inheritdoc}
     */
    public function isEnabled($paramName, Request $request)
    {
        return $request->query->has($paramName);
    }
}
