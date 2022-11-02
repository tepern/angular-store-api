<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OptionsCorsResponse
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
        /* @var $response Response */
        $response = $next($request);
        if (!$request->isMethod('OPTIONS')) {
            return $response;
        }
        
        $headers = [
            'Access-Control-Allow-Origin' => '*',
        ];
        return $response->withHeaders($headers);
    }
}
