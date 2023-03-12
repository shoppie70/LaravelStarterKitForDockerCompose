<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BasicAuthMiddleware
{
    private string $basic_user;
    private string $basic_pass;

    public function __construct()
    {
        $this->basic_user = config('app.basic_user');
        $this->basic_pass = config('app.basic_pass');
    }

    public function handle(Request $request, Closure $next)
    {
        if (app()->isLocal()) {
            $username = $request->getUser();
            $password = $request->getPassword();

            if ($username === $this->basic_user && $password === $this->basic_pass) {
                return $next($request);
            }

            abort(401, "Enter username and password.", [
                header('WWW-Authenticate: Basic realm="Sample Private Page"'),
                header('Content-Type: text/plain; charset=utf-8')
            ]);
        }
        return $next($request);
    }
}
