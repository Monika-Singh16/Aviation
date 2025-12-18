<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  <-- add this parameter!
     */
    public function handle(Request $request, Closure $next,string $role): Response
    {
        // If not logged in → redirect to login
        if (!Auth::guard('employee')->check()) {
            return redirect()->route('admin.login');
        }


       // Get logged-in user
        $user = Auth::guard('employee')->user();

      

        //  // Check if user has a role
        if (!$user->role || $user->role->name !== $role) {
            abort(403, 'Unauthorized access');
        }

        
         // Otherwise → continue request
        return $next($request);
    }
}
