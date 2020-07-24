<?php

namespace Agenciafmd\Pwa\Http\Controllers;

class PwaController
{
    public function manifest()
    {
        $view = [
            'name' => config('pwa.manifest.name'),
            'short_name' => config('pwa.manifest.short_name'),
            'description' => config('pwa.manifest.description'),
            'scope' => config('pwa.manifest.scope'),
            'start_url' => config('pwa.manifest.start_url'),
            'display' => config('pwa.manifest.display'),
            'background_color' => config('pwa.manifest.background_color'),
            'theme_color' => config('pwa.manifest.theme_color'),
            'orientation' => config('pwa.manifest.orientation'),
            'sender_id' => config('pwa.manifest.sender_id'),
        ];

        return response(view('agenciafmd/pwa::manifest', $view)->render())->header('Content-Type', 'application/json');
    }

    public function sw()
    {
        $view = [
            'name' => config('pwa.sw.name'),
            'files' => config('pwa.sw.files'),
        ];

        return response(view('agenciafmd/pwa::sw', $view)->render())->header('Content-Type', 'application/javascript');
    }


    public function offline()
    {
        return view('agenciafmd/pwa::offline');
    }
}
