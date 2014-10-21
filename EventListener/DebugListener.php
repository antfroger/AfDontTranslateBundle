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
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Class DebugListener
 * 
 * @package Af\Bundle\DontTranslateBundle\EventListener
 * 
 * @author Antoine Froger <antfroger@gmail.com>
 */
class DebugListener
{
    /** @var SecurityContext */
    private $securityContext;

    /** @var Translator */
    private $translator;

    /** @var string */
    private $requestParam;

    /** @var array */
    private $authorizedRoles;

    /**
     * Constructor
     *
     * @param SecurityContextInterface $securityContext
     * @param Translator               $translator
     * @param string                   $requestParam
     * @param array                    $authorizedRoles
     */
    public function __construct(SecurityContextInterface $securityContext, Translator $translator, $requestParam, array $authorizedRoles = array())
    {
        $this->securityContext = $securityContext;
        $this->translator      = $translator;
        $this->requestParam    = $requestParam;
        $this->authorizedRoles = $authorizedRoles;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if (null === $this->securityContext->getToken()) {
            return;
        }

        $request = $event->getRequest();

        // Checks if the feature is enabled and the user has the right access
        if (!is_null($request->query->get($this->requestParam)) && $this->isGranted()) {
            $this->translator->setDebug(true);
        }
    }

    /**
     * Checks if the access is possible or not
     *
     * @return bool
     */
    private function isGranted()
    {
        if (empty($this->authorizedRoles)) {
            return true;
        }

        foreach ($this->authorizedRoles as $roleName) {
            if ($this->securityContext->isGranted($roleName)) {
                return true;
            }
        }

        return false;
    }
}
