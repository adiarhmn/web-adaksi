<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/admin_route.php';
require __DIR__ . '/guest_route.php';

// 404 Not Found
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
