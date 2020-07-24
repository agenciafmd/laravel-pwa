<?php

use Agenciafmd\Pwa\Http\Controllers\PwaController;

Route::get('/manifest.json', [PwaController::class, 'manifest'])
    ->name('pwa.manifest');
Route::get('/sw.js', [PwaController::class, 'sw'])
    ->name('pwa.sw');
Route::get('/offline', [PwaController::class, 'offline'])
    ->name('pwa.offline');
