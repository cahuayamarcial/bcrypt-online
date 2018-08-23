<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if (\Auth::user()->rol == 'admin') {
            return $next($request);
        }
        \Session::flash('alert', 'error|Mensaje|Acceso no autorizado.');
        return redirect('/');
    }
}
