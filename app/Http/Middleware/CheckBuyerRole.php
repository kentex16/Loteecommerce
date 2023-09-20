<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBuyerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is a "Buyer" in the session
        if (session('user_role') === 'buyer') {
            return $next($request);
        }

        // Redirect to an unauthorized page or show an error message
        return redirect()->route('unauthorized');
    }
}