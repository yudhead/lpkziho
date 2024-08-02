<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceToHTTPS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (str_ends_with($request->getHost(), 'http://147.185.221.20:57538/')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }



        return $next($request);
    }
}
