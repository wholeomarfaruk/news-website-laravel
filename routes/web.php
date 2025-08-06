<?php

use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Auth\AuthController;
use App\Livewire\Roles;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('dashboard', function () {
    return redirect()->route('admin.dashboard'); // Redirect to the admin dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::get('/roles', function () {
            return view('admin.roles');
        })->name('roles');
        Route::get('/users', function () {
            return view('admin.users');
        })->name('users');

        //roles
        Route::get('/roles/create', [RolesController::class, 'createRoleForm'])->name('roles.create');
        Route::post('/roles/store', [RolesController::class, 'createRole'])->name('roles.store');
        Route::get('/roles/edit/{id}', [RolesController::class, 'editRole'])->name('roles.edit');
        Route::put('/roles/update/{id}', [RolesController::class, 'updateRole'])->name('roles.update');
    });
