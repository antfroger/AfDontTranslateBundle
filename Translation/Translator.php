<?php

/*
 * This file is part of the AfDontTranslateBundle package
 *
 * (c) Antoine Froger <antfroger@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */
namespace Af\Bundle\DontTranslateBundle\Translation;

use Symfony\Bundle\FrameworkBundle\Translation\Translator as BaseTranslator;

/**
 * Class Translator
 * 
 * @package Af\Bundle\DontTranslateBundle\Translation
 * 
 * @author Antoine Froger <antfroger@gmail.com>
 */
class Translator extends BaseTranslator
{
    protected $debugMode = false;

    /**
     * {@inheritdoc}
     */
    public function trans($id, array $parameters = array(), $domain = null, $locale = null)
    {
        if ($this->debugMode) {
            return $id;
        }

        return parent::trans($id, $parameters, $domain, $locale);
    }

    /**
     * @param  boolean $debugMode
     *
     * @return $this
     */
    public function setDebug($debugMode)
    {
        $this->debugMode = $debugMode;

        return $this;
    }
}
