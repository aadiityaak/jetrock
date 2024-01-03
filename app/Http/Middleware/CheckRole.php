<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        // Logika pengecekan peran di sini

        if (!$request->user() || $request->user()->role !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}