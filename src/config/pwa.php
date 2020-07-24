<?php

return [
    'manifest' => [
        'name' => env('PWA_MANIFEST_NAME', config('app.name')),
        'short_name' => env('PWA_MANIFEST_SHORT_NAME', 'F&MD'),
        'description' => env('PWA_MANIFEST_DESCRIPTION'),
        'scope' => env('PWA_MANIFEST_SCOPE', '/'),
        'start_url' => env('PWA_MANIFEST_START_URL', '/?utm_source=pwa'),
        'display' => env('PWA_MANIFEST_DISPLAY', 'standalone'),
        'background_color' => env('PWA_MANIFEST_BACKGROUND_COLOR', '#FFFFFF'),
        'theme_color' => env('PWA_MANIFEST_THEME_COLOR', '#000000'),
        'orientation' => env('PWA_MANIFEST_ORIENTATION', 'portrait'),
        'sender_id' => env('PWA_MANIFEST_SENDER_ID', ''),
        'app_id' => env('PWA_MANIFEST_APP_ID', ''),
    ],
    'sw' => [
        'name' => env('PWA_SW_NAME', 'sw'),
        'files' => [
            '/favicon.ico',
            '/css/frontend.css',
            '/js/frontend.js',
            '/offline',
        ],
    ],
    'a2hs' => [
        'title' => env('PWA_A2HS_TITLE', config('app.name')),
        'message' => env('PWA_A2HS_MESSAGE', 'Adicione um atalho ao seu celular. É super leve, não detona seu 4G.'),
        'button' => env('PWA_A2HS_BUTTON', 'Instalar'),
        'background' => env('PWA_A2HS_BACKGROUND', '#000000'),
        'color' => env('PWA_A2HS_COLOR', '#FFFFFF'),
    ],
    'offline' => [
        'title' => env('PWA_OFFLINE_TITLE', 'Offline'),
        'code' => env('PWA_OFFLINE_CODE', 'Offline'),
        'message' => env('PWA_OFFLINE_MESSAGE', 'Por favor, verifique sua conexão com a internet.'),
    ],
];
