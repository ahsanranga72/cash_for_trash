<?php

namespace Modules\AgentModule\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AgentMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->user_type === AGENT) {
            return $next($request);
        }
       return redirect('/agent/auth/login');
    }
}
