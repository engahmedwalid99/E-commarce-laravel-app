<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolesMiddleWare
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if(Auth::user()->role != $role){
            abort(401, 'UNAUTHORIZED ACTION');
        }
        return $next($request);
    }
}