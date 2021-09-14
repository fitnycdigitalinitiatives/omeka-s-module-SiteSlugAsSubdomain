<?php
namespace SiteSlugAsSubdomain;

return [
  'view_manager' => [
        'template_path_stack' => [
            dirname(__DIR__) . '/view',
        ],
    ],
  'view_helpers' => [
    'invokables' => [
        'userBar' => View\Helper\SiteSlugAsSubdomainUserBar::class,
    ],
  ],
];
