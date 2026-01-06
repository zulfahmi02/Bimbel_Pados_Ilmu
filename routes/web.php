<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\PendaftaranController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/program', [ProgramController::class, 'index'])->name('program');
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/event/{slug}', [EventController::class, 'show'])->name('event.show');
Route::post('/event/{slug}/register', [EventController::class, 'register'])->name('event.register');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');