<?php

namespace App\Http\Middleware;

use Closure;

class BackendauthorMiddleware
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
        $isLogined = true;

        if(!$isLogined){
            dd('vui long dang nhap');
        }
       // dd($request->all());
        return $next($request);
    }
}
