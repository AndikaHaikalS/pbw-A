<?php

use Illuminate\Support\Facades\Route;

Route::get('/tentang-kami', function () {
    return view('about'); // Kita akan menampilkan view bernama 'about'
});

Route::get('/', function () {
    return view('Welcome'); // Kita akan menampilkan view bernama 'about'
});

Route::get('/kontak', function () {
    return view('Kontak'); // Kita akan menampilkan view bernama 'about'
});