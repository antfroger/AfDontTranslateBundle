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

/**
 * Class TranslatorTest
 *
 * @package Af\Bundle\DontTranslateBundle\Tests\Translation
 *
 * @author Antoine Froger <antfroger@gmail.com>
 */
class TranslatorTest extends \PHPUnit_Framework_TestCase
{
    public function testTranslate()
    {
        // debug = false, messages are translated
        $translator = $this->getTranslator(false);

        $this->assertEquals('foo translation', $translator->trans('foo'));
        $this->assertEquals('bar translation', $translator->trans('bar'));
        $this->assertEquals('baz translation', $translator->trans('baz'));
        $this->assertEquals('foo 2', $translator->transChoice('foo', 2));
        $this->assertEquals('bar single', $translator->transChoice('bar', 0));
        $this->assertEquals('bar plural', $translator->transChoice('bar', 1));
    }

    public function testDontTranslate()
    {
        // debug = true, messages aren't translated
        $translator = $this->getTranslator(true);

        $this->assertEquals('foo', $translator->trans('foo'));
        $this->assertEquals('bar', $translator->trans('bar'));
        $this->assertEquals('baz', $translator->trans('baz'));
        $this->assertEquals('foo', $translator->transChoice('foo', 2));
        $this->assertEquals('bar', $translator->transChoice('bar', 0));
        $this->assertEquals('bar', $translator->transChoice('bar', 1));
    }

    private function getTranslator($debug)
    {
        $debug = (bool)$debug;

        $translator = $this->getMock('Symfony\Component\Translation\TranslatorInterface');
        $translator
            ->expects($debug ? $this->never() : $this->exactly(3))
            ->method('trans')
            ->will($this->returnCallback(function ($key) {
                $values = array(
                    'foo' => 'foo translation',
                    'bar' => 'bar translation',
                    'baz' => 'baz translation',
                );

                return isset($values[$key]) ? $values[$key] : null;
            }))
        ;
        $translator
            ->expects($debug ? $this->never() : $this->exactly(3))
            ->method('transChoice')
            ->will($this->returnCallback(function ($key, $count) {
                $values = array(
                    'foo' => 'foo 0|foo 1|foo 2',
                    'bar' => 'bar single|bar plural',
                );

                if (!isset($values[$key])) {
                    return null;
                }

                $results = explode('|', $values[$key]);

                return isset($results[$count]) ? $results[$count] : null;
            }))
        ;

        $translator = new Translator($translator);
        $translator->setDebug($debug);

        return $translator;
    }
}
