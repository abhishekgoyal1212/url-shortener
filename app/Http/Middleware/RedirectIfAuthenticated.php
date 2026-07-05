<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {

            return match (auth()->user()->role) {

                'SuperAdmin' => redirect()->route('superadmin.dashboard'),

                'Admin' => redirect()->route('admin.dashboard'),

                'Member' => redirect()->route('member.dashboard'),

                default => redirect('/'),
            };
        }

        return $next($request);
    }
}
