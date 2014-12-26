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
 * Class ActivationMode
 *
 * @package Af\Bundle\DontTranslateBundle\ActivationMode
 *
 * @author  Antoine Froger <antfroger@gmail.com>
 */
interface ActivationModeInterface
{
    /**
     * @param  string  $paramName   Name of the parameter that enables the mode
     * @param  Request $request
     *
     * @return bool
     */
    public function isEnabled($paramName, Request $request);
}
