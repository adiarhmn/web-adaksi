<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin_page.main.dashboard');
    });

    // Anggota Manajement
    Route::prefix('anggota')->group(function () {
        Route::get('/', function () {
            return view('admin_page.anggota.index');
        });
    });
});
