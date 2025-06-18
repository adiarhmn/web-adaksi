<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// Auth Routes
Route::controller(AuthController::class)
    ->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'login');
        Route::post('logout', 'logout')->name('logout');
    });


require __DIR__ . '/admin_route.php';
require __DIR__ . '/guest_route.php';
require __DIR__ . '/anggota_route.php';




// 404 Not Found
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
