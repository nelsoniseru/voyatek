<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyToken
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('token');

        // Check if the token matches the expected value
        if ($token !== 'vg@123') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
