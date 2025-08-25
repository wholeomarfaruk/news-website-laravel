<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Website\HomeController;
use App\Livewire\Roles;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);
Route::get('/single-post',[HomeController::class,'singlePostDemo'])->name('post');
Route::get('/{slug}',[HomeController::class,'singlePost'])->name('singlepost');
Route::get('/category',[HomeController::class,'category'])->name('category');
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

        //Category
        Route::get('/categories', [CategoryController::class, 'categoryList'])->name('category.list');

        //Posts
        Route::get('/posts',[PostController::class, 'postList'])->name('post.list');
        Route::get('/posts/create', [PostController::class, 'createPostForm'])->name('post.create');
        Route::post('/posts/store', [PostController::class, 'createPost'])->name('post.store');
        Route::get('/posts/edit/{id}', [PostController::class, 'editPost'])->name('post.edit');
        Route::put('/posts/update/{id}', [PostController::class, 'updatePost'])->name('post.update');
        Route::delete('/posts/delete/{id}', [PostController::class, 'deletePost'])->name('post.delete');

        //user profile
        Route::get('/profile',[UserController::class,'profile'])->name('profile');
    });
