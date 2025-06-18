<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/daftar-anggota', function () {
    return view('guest_page.anggota_daftar_form');
});

Route::prefix('anggota')
->controller(AnggotaController::class)
->group(function () {
    Route::post('/daftar', 'store')->name('anggota.store');
});
