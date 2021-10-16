<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user())
        {
            // echo "<pre>";
            // var_dump($next);
            // echo "</pre>";
            // exit;
            if(auth()->user()->user_type == 'admin')
            {
                return $next($request);
                // exit;
            }
        }
        return redirect('/');
    }
}
