<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\Auth\AuthenticatedSessionController;
use Modules\Admin\Http\Controllers\ContactController;
use Modules\Admin\Http\Controllers\DashboardController;
use Modules\Admin\Http\Controllers\NewsController;
use Modules\Admin\Http\Controllers\SystemController;
use Modules\Admin\Http\Controllers\UserController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function (): void {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::middleware('auth:web')->group(static function (): void {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        // admin.user.
        Route::group(['prefix' => 'user', 'as' => 'user.'], static function (): void {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        });

        // admin.news.
        Route::group(['prefix' => 'news', 'as' => 'news.'], static function (): void {
            Route::get('/', [NewsController::class, 'index'])->name('index');
            Route::get('/create', [NewsController::class, 'create'])->name('create');
            Route::get('/{news}/edit', [NewsController::class, 'edit'])->name('edit');
        });

        // admin.contact.
        Route::group(['prefix' => 'contact', 'as' => 'contact.'], static function (): void {
            Route::get('/', [ContactController::class, 'index'])->name('index');
        });

        // admin.profile.
        Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], static function (): void {
            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
            Route::get('/{admin}', [AdminController::class, 'edit'])->name('edit');
        });

        // admin.system.
        Route::group(['prefix' => 'system', 'as' => 'system.'], static function (): void {
            Route::get('/phpmyadmin', [SystemController::class, 'phpmyadmin'])->name('phpmyadmin');
            Route::get('/artisan', [SystemController::class, 'artisan'])->name('artisan');
            Route::post('/artisan/run', [SystemController::class, 'run'])->name('artisan.run');
        });
    });
});
