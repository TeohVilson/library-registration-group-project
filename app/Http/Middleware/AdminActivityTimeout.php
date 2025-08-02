<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminActivityTimeout
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) {
            $lastActivity = session('admin_last_activity');
            $timeout = 60; // 1 minute in seconds

            if ($lastActivity && time() - $lastActivity > $timeout) {
                Auth::logout();
                session()->flush();
                return redirect()->route('login')
                    ->with('error', 'Admin session expired due to inactivity. Please login again.');
            }

            session(['admin_last_activity' => time()]);
        }

        return $next($request);
    }
} 