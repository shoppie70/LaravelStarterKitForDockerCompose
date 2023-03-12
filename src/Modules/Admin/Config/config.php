<?php

return [
    'sidebar' => [
        'name' => 'Admin',
        'sidebar' => [
            [
                'id' => 'news',
                'name' => 'お知らせ管理',
                'menus' => [
                    [
                        'uri' => '/admin/news',
                        'title' => 'お知らせ一覧',
                    ],
                    [
                        'uri' => '/admin/news/create',
                        'title' => 'お知らせ投稿',
                    ],
                ],
            ],
            [
                'id' => 'contact',
                'name' => 'お問い合わせ管理',
                'menus' => [
                    [
                        'uri' => '/admin/contact?type=1',
                        'title' => 'お問い合わせ一覧',
                    ],
                ],
            ],
            [
                'id' => 'users',
                'name' => 'アカウント管理',
                'menus' => [
                    [
                        'uri' => '/admin/user',
                        'title' => 'アカウント一覧',
                    ],
                    [
                        'uri' => '/admin/user/create',
                        'title' => 'アカウント追加',
                    ],
                ],
            ],
            [
                'id' => 'system',
                'name' => 'システム管理',
                'menus' => [
                    [
                        'uri' => '/admin/system/phpmyadmin',
                        'title' => 'PHP情報',
                    ],
                    [
                        'uri' => '/admin/system/artisan',
                        'title' => 'キャッシュ管理',
                    ],
                ],
            ],
        ],
    ],
];
