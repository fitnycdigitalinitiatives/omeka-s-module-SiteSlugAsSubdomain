<?php

namespace SiteSlugAsSubdomain\Service\Controller;

use Interop\Container\ContainerInterface;
use SiteSlugAsSubdomain\Controller\SiteLogoutController;
use Laminas\ServiceManager\Factory\FactoryInterface;

class SiteLogoutControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $services, $requestedName, array $options = null)
    {
        return new SiteLogoutController($services->get('Omeka\AuthenticationService'));
    }
}
