<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();
            // Check the user's role and store it in the session
            session(['user_role' => $user->usertype]);
        }

        return $next($request);
    }
}
