<?php

use Illuminate\Support\Facades\Route;
use Modules\Front\Http\Controllers\LoginController;


//Route::middleware('auth:player')->group(function () {
//    Route::group(['prefix' => 'player', 'as' => 'player.'], static function (): void {
//        Route::group(['prefix' => 'login', 'as' => 'login.'], static function (): void {
//            Route::get('/', [LoginController::class, 'index'])->name('index');
//            Route::post('/', [LoginController::class, 'login'])->name('post');
//        });
//
//        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//    });
//});
