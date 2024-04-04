<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('employee')->check()) {
            $response = [
                'success' => true,
                'data'    => '',
                'message' => 'Unauthorized',
            ];
            return response()->json($response, 401);
        }
        return $next($request);
    }
}
