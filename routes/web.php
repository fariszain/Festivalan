<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('laravel_blade_views.about');
})->name('about');

Route::get('/Beranda', function () {
    return view('laravel_blade_views.Beranda');
})->name('Beranda');

Route::get('/contact', function () {
    return view('laravel_blade_views.contact');
})->name('contact');

Route::get('/gallery', function () {
    return view('laravel_blade_views.gallery');
})->name('gallery');

Route::get('/Profile', function () {
    return view('laravel_blade_views.Profile');
})->name('Profile');

Route::get('/services', function () {
    return view('laravel_blade_views.services');
})->name('services');

Route::get('/register', function () {
    return view('laravel_blade_views.register');
})->name('register');

Route::get('/ubahprofile', function () {
    return view('laravel_blade_views.ubahprofile');
})->name('ubahprofile');

Route::get('/auth', function () {
    return view('laravel_blade_views.auth');
})->name('auth');
