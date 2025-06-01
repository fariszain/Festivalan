<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/Beranda', function () {
    return view('Beranda');
})->name('Beranda');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/Profile', function () {
    return view('Profile');
})->name('Profile');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/ubahprofile', function () {
    return view('ubahprofile');
})->name('ubahprofile');

Route::get('/auth', function () {
    return view('auth');
})->name('auth');

Route::get('/registerevent', function () {
    return view('registerevent');
})->name('registerevent');

Route::get('/detail', function () {
    return view('detail');
})->name('detail');