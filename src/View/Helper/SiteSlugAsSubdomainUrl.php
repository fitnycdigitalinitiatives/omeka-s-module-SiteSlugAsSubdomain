<?php
namespace SiteSlugAsSubdomain\View\Helper;

use Laminas\View\Helper\Url as LaminasUrl;

/**
 * Override of the default Laminas Url helper
 *
 * Replaces the default force_canonical implementation with usage of the serverUrl helper
 */
class SiteSlugAsSubdomainUrl extends LaminasUrl
{
    public function __construct(LaminasUrl $baseUrlHelper)
    {
        $this->router = $baseUrlHelper->router;
        $this->routeMatch = $baseUrlHelper->routeMatch;
    }

    public function __invoke($name = null, $params = [], $options = [], $reuseMatchedParams = false)
    {
        // This is also done in the base Url helper; we need to do it here also because
        // passing through another call messes up func_num_args
        if (3 === func_num_args() && is_bool($options)) {
            $reuseMatchedParams = $options;
            $options = [];
        }

        $forceCanonical = false;
        if (isset($options['force_canonical']) && $options['force_canonical']) {
            unset($options['force_canonical']);
            $forceCanonical = true;
        }

        $url = parent::__invoke($name, $params, $options, $reuseMatchedParams);

        if ($forceCanonical) {
            // All api url's need to reference back to the main admin domain not the site domain
            if (((strpos($name, 'api') === 0) || (strpos($name, 'iiif') === 0)) && ($adminHost = $this->getView()->setting('adminname'))) {
                $url = $this->getView()->serverUrl($url);
                $oldHost = parse_url($url, PHP_URL_HOST);
                return str_replace($oldHost, $adminHost, $url);
            } else {
                return $this->getView()->serverUrl($url);
            }
        }
        return $url;
    }
}