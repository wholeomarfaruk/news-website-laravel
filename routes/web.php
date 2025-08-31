<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Website\HomeController;
use App\Livewire\Roles;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\VerifyEmailController;
use Livewire\Volt\Volt;
require __DIR__ . '/auth.php';


// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Demo single post (example)
Route::get('/single-post', [HomeController::class, 'singlePostDemo'])->name('post');




Route::get('/optimize', function () {
    // Simple security check with a secret key
    // if (request()->get('key') !== env('MAINTENANCE_KEY')) {
    //     abort(403, 'Unauthorized');
    // }

    // Run optimization & clear caches
    Artisan::call('optimize');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:clear');

    return '✅ Application optimized and caches cleared!';
});



Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('dashboard', function () {
    return redirect()->route('admin.dashboard'); // Redirect to the admin dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
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
        Route::get('/posts', [PostController::class, 'postList'])->name('post.list');
        Route::get('/posts/create', [PostController::class, 'createPostForm'])->name('post.create');
        Route::post('/posts/store', [PostController::class, 'createPost'])->name('post.store');
        Route::get('/posts/edit/{id}', [PostController::class, 'editPost'])->name('post.edit');
        Route::put('/posts/update/{id}', [PostController::class, 'updatePost'])->name('post.update');
        Route::delete('/posts/delete/{id}', [PostController::class, 'deletePost'])->name('post.delete');

        //user profile
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::get('/optimize', function () {
            Artisan::call('optimize');
            return "Application optimized successfully!";
        });

        Route::get('/clear-cache', function () {
            Artisan::call('optimize:clear');
            return "Cache cleared successfully!";
        });

        Route::get('/migrate', function () {
            Artisan::call('migrate', ['--force' => true]);
            return "Migration completed successfully!";
        });
    });
// Category page
Route::get('/posts/recent', [HomeController::class, 'recentPosts'])->name('recent.post.list');

// Post inside category
Route::get('/category/{category}/{slug}', [HomeController::class, 'postShow'])->name('post.show');
// Route::get('/{slug}', [HomeController::class,'singlePost'])->name('singlepost');

Route::get('/category/{category}', [HomeController::class, 'categoryPost'])->name('category');
