<?php

namespace SiteSlugAsSubdomain;

return [
  'controllers' => [
    'factories' => [
      'SiteSlugAsSubdomain\Controller\SiteLogout' => Service\Controller\SiteLogoutControllerFactory::class,
    ]
  ],
  'view_manager' => [
    'template_path_stack' => [
      dirname(__DIR__) . '/view',
    ],
  ],
  'view_helpers' => [
    'invokables' => [
      'userBar' => View\Helper\SiteSlugAsSubdomainUserBar::class,
    ],
    'delegators' => [
      'Laminas\View\Helper\Url' => [
        Service\Delegator\SiteSlugAsSubdomainUrlDelegatorFactory::class,
      ],
    ],
  ],
  'router' => [
    'routes' => [
      'site' => [
        'child_routes' => [
          'site-logout' => [
            'type' => 'Segment',
            'options' => [
              'route' => '/logout',
              'defaults' => [
                '__NAMESPACE__' => 'SiteSlugAsSubdomain\Controller',
                'controller' => 'SiteLogout',
                'action' => 'logout',
              ],
            ],
          ],
        ],
      ],
    ],
  ],
];
