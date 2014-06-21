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

use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class Translator
 *
 * @package Af\Bundle\DontTranslateBundle\Translation
 *
 * @author Antoine Froger <antfroger@gmail.com>
 */
class Translator implements TranslatorInterface
{
    protected $translator;
    /** @var bool */
    protected $debug = false;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * Sets the debug mode
     *
     * @param  bool $debug
     *
     * @return $this
     */
    public function setDebug($debug)
    {
        $this->debug = (bool)$debug;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function trans($id, array $parameters = array(), $domain = null, $locale = null)
    {
        if ($this->debug) {
            return $id;
        }

        return $this->translator->trans($id, $parameters, $domain, $locale);
    }

    /**
     * {@inheritdoc}
     */
    public function transChoice($id, $number, array $parameters = array(), $domain = null, $locale = null)
    {
        if ($this->debug) {
            return $id;
        }

        return $this->translator->transChoice($id, $number, $parameters, $domain, $locale);
    }

    /**
     * {@inheritdoc}
     */
    public function setLocale($locale)
    {
        $this->translator->setLocale($locale);
    }

    /**
     * {@inheritdoc}
     */
    public function getLocale()
    {
        return $this->translator->getLocale();
    }
}
