<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    protected string $player_route = 'player.login.index';
    protected string $admin_route = 'admin.login';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
//        if (! $request->expectsJson()) {
//            return route('login');
//        }

        if (!$request->expectsJson()) {
            if (Route::is('player.*')) {
                return route($this->player_route);
            }

            if (Route::is('admin.*')) {
                return route($this->admin_route);
            }
        }
    }
}
