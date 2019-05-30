<?php

namespace App\Http\Middleware\V1;

use Closure;

class TokenMiddleware
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
        $header =  apache_request_headers();

        if(!empty($header[env('_LANG_HEADER_V1')]))
        {
            if( $header[env('_LANG_HEADER_V1')] !== env('V1_TOKEN') ){return env('LANG_UNAUTHORIZED');}
        }else
        {
            return env('_LANG_UNAUTHORIZED');
        }

        return $next($request);
    }
}
