<?php

namespace App\Http\Middleware;

use Closure;
use Request;

use App\Services\SignVerify\Verify;

class SignVerify
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
        if (Verify::verify()) {
            echo 'ok';
        } else {
            echo 'bu ok';
        }
        
        return $next($request);
    }


  
}
