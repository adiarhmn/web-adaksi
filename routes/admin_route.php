<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware(['access:admin|superadmin'])
    ->group(function () {
        // Admin Dashboard
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });
        Route::get('dashboard', function () {
            return view('admin_page.main.dashboard');
        })->name('admin.dashboard');

        // Anggota Manajement
        Route::prefix('anggota')
            ->controller(AnggotaController::class)
            ->group(function () {
                Route::get('/', 'showAll');
                Route::post('validasi/{id}', 'validasi')->where('id', '[0-9]+');
            });
    });
