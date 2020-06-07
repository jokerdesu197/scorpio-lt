<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRequest
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
        //SET TIME
        if ($request->session()->has('timeout')) {
            $request->session()->forget('timeout');

            $error = json_decode(Config::find(get_const('CONFIG_LOGIN'))->attributes);
            $request->session()->put('timeout', $error[0]->timeout);
        }
//        $timeout = $request->session()->get('timeout');
//        $user = Auth::user();
//        $user->expire_time = Carbon::now()->addMinutes($timeout)->format('Y-m-d H:i:s');;
//        $user->save();
        //SET PERMISSION
        if ($request->session()->has('permission')) {
            $request->session()->forget('permission');

            $permissions = Auth::user()->roles->first();
            if ($permissions) {
                $permissions = $permissions->permission()->pluck('name')->toArray();
            }
            $request->session()->put('permission', $permissions);
        }
//        $permissions = Auth::user()->roles->first()->permission()->pluck('name')->toArray();

        return $next($request);
    }
}
