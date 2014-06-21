<?php

/*
 * This file is part of the AfDontTranslateBundle package
 *
 * (c) Antoine Froger <antfroger@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Af\Bundle\DontTranslateBundle\EventListener;

use Af\Bundle\DontTranslateBundle\Translation\Translator;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Class DebugListener
 * 
 * @package Af\Bundle\DontTranslateBundle\EventListener
 * 
 * @author Antoine Froger <antfroger@gmail.com>
 */
class DebugListener
{
    private $translator;

    /**
     * Constructor
     *
     * @param Translator $translator
     * @param str        $requestParam
     */
    public function __construct(Translator $translator, $requestParam)
    {
        $this->translator   = $translator;
        $this->requestParam = $requestParam;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        if (!is_null($request->query->get($this->requestParam))) {
            $this->translator->setDebug(true);
        }
    }
}
