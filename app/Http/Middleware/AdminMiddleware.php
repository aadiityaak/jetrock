<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna terotentikasi dan memiliki peran admin
        if (auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);
        }

        // Jika tidak, kembalikan respons 403 (Unauthorized)
        abort(403, 'Unauthorized');
    }
}
