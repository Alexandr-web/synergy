<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Helpers\AuthToken;

class RedirectUserIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = AuthToken::getUserId();
        $findUserById = is_int($userId) ? Student::find($userId)->first() : null;

        if (!$findUserById) {
            return redirect('/auth/login');
        }

        return $next($request);
    }
}
