<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
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
