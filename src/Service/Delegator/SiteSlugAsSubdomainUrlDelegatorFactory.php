<?php
namespace SiteSlugAsSubdomain\Service\Delegator;

use Laminas\ServiceManager\Factory\DelegatorFactoryInterface;
use Interop\Container\ContainerInterface;
use SiteSlugAsSubdomain\View\Helper\SiteSlugAsSubdomainUrl;

class SiteSlugAsSubdomainUrlDelegatorFactory implements DelegatorFactoryInterface
{
    public function __invoke(ContainerInterface $container, $name,
        callable $callback, array $options = null
    ) {
        return new SiteSlugAsSubdomainUrl($callback());
    }
}
