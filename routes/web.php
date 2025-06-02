<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController; // Pastikan ini ada
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware; // Jika Anda menggunakan nama kelas langsung

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Utama (Public)
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/Beranda', [HomeController::class, 'Beranda'])->name('Beranda');

// Halaman Statik (Public)
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');
Route::get('/gallery', function () { return view('gallery'); })->name('gallery');
Route::get('/services', function () { return view('services'); })->name('services');

// Rute Autentikasi
Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Rute yang Dilindungi (Harus Login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 
    Route::get('/Profile', [AuthController::class, 'profile'])->name('Profile'); 
    Route::get('/ubahprofile', [AuthController::class, 'editProfile'])->name('ubahprofile'); 
    Route::put('/ubahprofile', [AuthController::class, 'updateProfile'])->name('ubahprofile.update'); 
    Route::get('/detail', [EventController::class, 'detail'])->name('detail'); 
    
    // Rute khusus untuk MAHASISWA
    Route::middleware(RoleMiddleware::class . ':mahasiswa')->group(function () { // atau 'check.role:mahasiswa'
        Route::get('/registerevent', [EventController::class, 'showRegistrationForm'])->name('registerevent'); 
        Route::post('/registerevent', [EventController::class, 'registerEvent'])->name('event.register'); 
        Route::post('/event/{event}/register-user', [EventController::class, 'registerUserToEvent'])->name('event.register.user');
    });

    // RUTE UNTUK ADMIN
    Route::middleware(RoleMiddleware::class . ':admin')->prefix('admin')->name('admin.')->group(function () { // atau 'check.role:admin'
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/event-proposals', [AdminController::class, 'listEventProposals'])->name('event.proposals');
        Route::post('/events/{event}/approve', [AdminController::class, 'approveEvent'])->name('event.approve');
        Route::post('/events/{event}/reject', [AdminController::class, 'rejectEvent'])->name('event.reject');
    });
});

// Form Kontak (Public)
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');