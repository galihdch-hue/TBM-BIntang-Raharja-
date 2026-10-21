<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Peserta\DashboardController as PesertaDashboardController;
use App\Http\Controllers\Peserta\MaterialController;
use App\Http\Controllers\Peserta\ScheduleController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


Route::get('/tentang', [AboutController::class, 'index'])
    ->name('about');


Route::get('/kegiatan', [ActivityController::class, 'index'])
    ->name('activities.index');


Route::get('/kegiatan/{activity}', [ActivityController::class, 'show'])
    ->name('activities.show');


Route::get('/berita', [NewsController::class, 'index'])
    ->name('news.index');


Route::get('/berita/{news}', [NewsController::class, 'show'])
    ->name('news.show');


Route::get('/galeri', [GalleryController::class, 'index'])
    ->name('gallery.index');


Route::get('/kontak', [ContactController::class, 'index'])
    ->name('contact.index');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');


Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');


Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| PESERTA
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('peserta')
    ->name('peserta.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [
            PesertaDashboardController::class,
            'index'
        ])->name('dashboard');


        // Jadwal
        Route::get('/jadwal', [
            ScheduleController::class,
            'index'
        ])->name('schedule.index');

        Route::get('/jadwal/{activity}', [
            ScheduleController::class,
            'show'
        ])->name('schedule.show');


        // Materi
        Route::get('/materi', [
            MaterialController::class,
            'index'
        ])->name('materials.index');

        Route::get('/materi/{material}', [
            MaterialController::class,
            'show'
        ])->name('materials.show');

    });