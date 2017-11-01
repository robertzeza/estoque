<?php

namespace estoque\Http\Middleware;

use Closure;

class AutorizacaoMiddleware
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
        if(!$request->is('/login2') && \Auth::guest())
        {
            return redirect('/login2');
        }
        return $next($request);
    }
}
