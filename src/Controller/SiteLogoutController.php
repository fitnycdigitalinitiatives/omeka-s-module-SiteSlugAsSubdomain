<?php

namespace SiteSlugAsSubdomain\Controller;

use Laminas\Authentication\AuthenticationService;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Session\Container;

class SiteLogoutController extends AbstractActionController
{

    /**
     * @var AuthenticationService
     */
    protected $auth;

    /**
     * @param AuthenticationService $auth
     */
    public function __construct(AuthenticationService $auth)
    {
        $this->auth = $auth;
    }

    public function logoutAction()
    {
        $this->auth->clearIdentity();

        $sessionManager = Container::getDefaultManager();

        $eventManager = $this->getEventManager();
        $eventManager->trigger('user.logout');

        $sessionManager->destroy();

        $this->messenger()->addSuccess('Successfully logged out'); // @translate
        return $this->redirect()->toRoute('site', ['site-slug' => $this->currentSite()->slug()]);
    }
}
