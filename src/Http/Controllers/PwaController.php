<?php

namespace Agenciafmd\Pwa\Http\Controllers;

class PwaController
{
    public function manifest()
    {
        $view = [
            'name' => config('laravel-pwa.manifest.name'),
            'short_name' => config('laravel-pwa.manifest.short_name'),
            'description' => config('laravel-pwa.manifest.description'),
            'scope' => config('laravel-pwa.manifest.scope'),
            'start_url' => config('laravel-pwa.manifest.start_url'),
            'display' => config('laravel-pwa.manifest.display'),
            'background_color' => config('laravel-pwa.manifest.background_color'),
            'theme_color' => config('laravel-pwa.manifest.theme_color'),
            'orientation' => config('laravel-pwa.manifest.orientation'),
            'sender_id' => config('laravel-pwa.manifest.sender_id'),
        ];

        return response(view('agenciafmd/pwa::manifest', $view)->render())->header('Content-Type', 'application/json');
    }

    public function sw()
    {
        $view = [
            'name' => config('laravel-pwa.sw.name'),
            'startUrl' => config('laravel-pwa.manifest.start_url'),
            'offlineUrl' => config('laravel-pwa.sw.offline_url'),
            'notFoundUrl' => config('laravel-pwa.sw.not_found_url'),
            'cacheFiles' => config('laravel-pwa.sw.cache_files'),
            'sw' => file_get_contents(__DIR__ . '/../../resources/js/sw.js'),
        ];

        return response(view('agenciafmd/pwa::sw', $view)->render())->header('Content-Type', 'application/javascript');
    }

    public function offline()
    {
        return view('agenciafmd/pwa::offline');
    }
}
