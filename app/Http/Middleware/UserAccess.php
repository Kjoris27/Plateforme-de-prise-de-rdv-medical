<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

// App\Http\Middleware\UserAccess.php

class UserAccess
{
    public function handle(Request $request, Closure $next, $userType)
    {
        if(auth()->user()->type == $userType) {
            return $next($request);
        }

        return response()->json(['You do not have permission to access this page.']);
    }
}

