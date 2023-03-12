<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\ContactController;
use Modules\Front\Http\Controllers\FrontController;
use Modules\Front\Http\Controllers\NewsController;

Route::get('/', [FrontController::class, 'index'])->name('index');

Route::group(['prefix' => 'news', 'as' => 'news.'], static function (): void {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/show/{news}', [NewsController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'contact', 'as' => 'contact.'], static function (): void {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::get('/complete', [ContactController::class, 'complete'])->name('complete');
    Route::post('/post', [ContactController::class, 'post'])->name('post');
});




