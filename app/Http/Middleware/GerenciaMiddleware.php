<?php

namespace App\Http\Middleware;

use Closure;

class GerenciaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->hasRole('gerencia') || auth()->user()->hasRole('administrador')  ) {
           
            return $next($request);
        }
        return redirect()->route('home');
    }
}
