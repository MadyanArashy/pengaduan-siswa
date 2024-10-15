<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
{
    if (auth()->check()) {
        if (auth()->user()->role == $role) {
            return $next($request);
        }

        // Allow access to the dashboard for all authenticated users
        if ($request->is('dashboard')) {
            return $next($request); // Continue to the dashboard
        }
    }

    return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses.');
}


}
