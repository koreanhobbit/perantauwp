<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'images' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'images' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'editor' => [
            'images' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'author' => [
            'images' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'provider' => [
            'images' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'guide' => [
            'images' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'customer' => [
            'images' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
