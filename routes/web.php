<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Owner\AboutPageController;
use App\Http\Controllers\Owner\ActivityController as OwnerActivityController;
use App\Http\Controllers\Owner\ContactPageController;
use App\Http\Controllers\Owner\DashboardController;
use App\Http\Controllers\Owner\GalleryController as OwnerGalleryController;
use App\Http\Controllers\Owner\HomePageController;
use App\Http\Controllers\Owner\NewsController as OwnerNewsController;
use App\Http\Controllers\Owner\PengurusController;
use App\Http\Middleware\EnsureManagementAccess;
use App\Http\Middleware\EnsurePemilik;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [LoginController::class, 'show'])
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->middleware('throttle:5,1')
    ->name('login.authenticate');

Route::middleware(['auth', EnsureManagementAccess::class])
    ->prefix('pengelola')
    ->name('owner.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('activities', OwnerActivityController::class)
            ->except('show');

        Route::resource('news', OwnerNewsController::class)
            ->except('show');

        Route::resource('gallery', OwnerGalleryController::class)
            ->except('show');

        Route::get('/home/edit', [HomePageController::class, 'edit'])
            ->name('home.edit');

        Route::put('/home', [HomePageController::class, 'update'])
            ->name('home.update');

        Route::get('/contact/edit', [ContactPageController::class, 'edit'])
            ->name('contact.edit');

        Route::put('/contact', [ContactPageController::class, 'update'])
            ->name('contact.update');

        Route::get('/about/edit', [AboutPageController::class, 'edit'])
            ->name('about.edit');

        Route::put('/about', [AboutPageController::class, 'update'])
            ->name('about.update');

        Route::middleware(EnsurePemilik::class)
            ->resource('pengurus', PengurusController::class)
            ->except('show')
            ->parameters(['pengurus' => 'pengurus']);

        Route::post('/logout', [LoginController::class, 'logout'])
            ->name('logout');
    });
