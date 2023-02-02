<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Helpers\AuthToken;

class CheckAuthToken
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
        $authHeader = $request->header('Authorization') ?? '';
        $token = str_replace('Bearer ', '', $authHeader);
        $tokenData = AuthToken::decode($token);

        if ($tokenData) {
            $userId = $tokenData['user_id'];
            $findUser = Student::find($userId);

            $request->isAuthenticated = (bool) $findUser;
            $request->user = $findUser;
        }

        return $next($request);
    }
}
