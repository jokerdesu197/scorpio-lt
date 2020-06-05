<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	dd($request);
        if (Auth::check()) {
            if (Auth::user()->can($this->registerPolicies())) {
                return redirect()->intended(route('admin-index'));
            } else {
                return redirect(route('user.profile'));
            }
        } else {
            return $next($request);
        }
    }
}
