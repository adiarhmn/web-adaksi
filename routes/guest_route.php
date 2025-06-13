<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/daftar-anggota', function () {
    return view('guest_page.anggota_daftar_form');
});
