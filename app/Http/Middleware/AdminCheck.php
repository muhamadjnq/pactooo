<?php

namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Closure;
use Illuminate\Support\Facades\Request;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->role == 'admin') {
                return $next($request);
            }
            abort(404);
        }
        return redirect(config('app.admin_dir') . '/login' . '?previous=' . Request::fullUrl());
    }
}
