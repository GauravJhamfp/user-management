<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Start PHP session if not started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // Check if user is logged in and is manager
        if (!isset($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'manager') {
            return redirect()->route('logout');
        }
        return $next($request);
    }
}
