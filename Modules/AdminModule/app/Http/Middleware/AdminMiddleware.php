<?php

namespace Modules\AdminModule\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->user_type === 'super-admin') {
            return $next($request);
        }
       return redirect('/admin/auth/login');
    }
}
