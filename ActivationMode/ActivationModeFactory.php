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

/**
 * Class ActivationModeFactory
 *
 * @package Af\Bundle\DontTranslateBundle\ActivationMode
 *
 * @author  Antoine Froger <antfroger@gmail.com>
 */
class ActivationModeFactory
{
    /**
     * @param  string $modeName
     *
     * @return ActivationMode
     * @throws \InvalidArgumentException
     */
    public function build($modeName)
    {
        switch (strtolower($modeName)) {
            case 'get':
                return new Get();
                break;
            case 'cookie':
                return new Cookie();
                break;
        }

        throw new \InvalidArgumentException(sprintf('%s is not a valid mode', $modeName));
    }
}
