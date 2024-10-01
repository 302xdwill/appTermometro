<?php

use App\Livewire\CategoryMain;
use App\Livewire\PostMain;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/noticias', PostMain::class)->name('noticias');
    Route::get('/categorias', CategoryMain::class)->name('categorias');
});
