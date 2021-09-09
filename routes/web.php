<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class)
        ->except('index');

    Route::resource('categories.posts', CategoryPostController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::resource('posts', AdminPostController::class);
    });
});


require __DIR__.'/auth.php';
