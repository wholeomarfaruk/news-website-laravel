<?php

use App\Livewire\Roles;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::get('/roles', function(){
            return view('admin.roles');
        })->name('roles');
        Route::get('/users', function(){
            return view('admin.users');
        })->name('users');
    });
