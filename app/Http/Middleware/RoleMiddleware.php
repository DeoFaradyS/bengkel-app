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
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // kalau belum login
        if (!auth()->check()) {
            return redirect('/login');
        }

        // kalau role tidak sesuai
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403); // forbidden
        }

        return $next($request);
    }
}
