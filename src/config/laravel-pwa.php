<?php

return [
    'manifest' => [
        'name' => config('app.name'),
        'short_name' => config('app.name'),
        'description' => '',
        'scope' => '/',
        'start_url' => '/?utm_source=pwa',
        'display' => 'standalone',
        'background_color' => '#FFFFFF',
        'theme_color' => '#000000',
        'orientation' => 'portrait',
        'sender_id' => '',
        'app_id' => '',
    ],
    'sw' => [
        'name' => 'sw',
        'offline_url' => '/offline',
        'not_found_url' => '/404',
        'cache_files' => [
            '/images/favicon.ico',
            '/js/frontend.js',
            '/css/frontend.css',
            '/',
        ]
    ],
    'a2hs' => [
        'title' => 'Quer mais agilidade e ainda economizar no 4G?',
        'message' => 'Instale nosso aplicativo!',
        'install' => 'Instalar',
        'close' => 'Agora não',
        'background' => '#000000',
        'color' => '#FFFFFF',
    ],
    'offline' => [
        'title' => 'Offline',
        'code' => 'Offline',
        'message' => 'Por favor, verifique sua conexão com a internet.',
    ],
];
