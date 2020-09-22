<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == config('roles.admin')) {

                return $next($request);
            } else {
                Auth::logout();

                return redirect()->route('admin.login');
            }
        } else {
            return redirect()->route('admin.login');
        }
    }
}
