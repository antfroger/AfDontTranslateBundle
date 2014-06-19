<?php
/*
 * This file is part of Travel With Me
 *
 * @copyright (c) Antoine Froger <antfroger@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Af\Bundle\DontTranslateBundle\Tests\Translation;

use Af\Bundle\DontTranslateBundle\Translation\Translator;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\MessageSelector;

/**
 * Class TranslatorTest
 *
 * @package Af\Bundle\DontTranslateBundle\Tests\Translation
 *
 * @author Antoine Froger <antfroger@gmail.com>
 */
class TranslatorTest extends \PHPUnit_Framework_TestCase
{
    public function testTrans()
    {
        // debug = true, messages are translated
        $translator = $this->getTranslator($this->getLoader());
        $translator->setLocale('fr');
        $translator->setFallbackLocales(array('en'));

        $this->assertEquals('foo (FR)', $translator->trans('foo'));
        $this->assertEquals('bar (EN)', $translator->trans('bar'));
        $this->assertEquals('choice 0 (EN)', $translator->transChoice('choice', 0));
        $this->assertEquals('no translation', $translator->trans('no translation'));

        // debug = true, no translation
        $translator->setDebug(true);

        $this->assertEquals('foo', $translator->trans('foo'));
        $this->assertEquals('bar', $translator->trans('bar'));
        $this->assertEquals('choice', $translator->transChoice('choice', 0));
        $this->assertEquals('no translation', $translator->trans('no translation'));
    }

    protected function getCatalogue($locale, $messages)
    {
        $catalogue = new MessageCatalogue($locale);
        foreach ($messages as $key => $translation) {
            $catalogue->set($key, $translation);
        }

        return $catalogue;
    }

    protected function getLoader()
    {
        $loader = $this->getMock('Symfony\Component\Translation\Loader\LoaderInterface');
        $loader
            ->expects($this->at(0))
            ->method('load')
            ->will($this->returnValue($this->getCatalogue('fr', array(
                'foo' => 'foo (FR)',
            ))))
        ;
        $loader
            ->expects($this->at(1))
            ->method('load')
            ->will($this->returnValue($this->getCatalogue('en', array(
                'foo'    => 'foo (EN)',
                'bar'    => 'bar (EN)',
                'choice' => '{0} choice 0 (EN)|{1} choice 1 (EN)|]1,Inf] choice inf (EN)',
            ))))
        ;

        return $loader;
    }

    protected function getContainer($loader)
    {
        $container = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $container
            ->expects($this->any())
            ->method('get')
            ->will($this->returnValue($loader))
        ;

        return $container;
    }

    protected function getTranslator($loader, $options = array())
    {
        $translator = new Translator(
            $this->getContainer($loader),
            new MessageSelector(),
            array('loader' => array('loader')),
            $options
        );

        $translator->addResource('loader', 'foo', 'fr');
        $translator->addResource('loader', 'foo', 'en');

        return $translator;
    }
}
 