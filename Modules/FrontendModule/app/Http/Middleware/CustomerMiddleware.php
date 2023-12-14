<?php

namespace Modules\FrontendModule\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->user_type === CUSTOMER) {
            return $next($request);
        }
       return redirect()->route('customer.auth.login');
    }
}
