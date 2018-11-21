<?php

namespace App\Http\Middleware;

use Closure;

class CheckMobil
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

        $ua = $request->http_user_agent;
        if ($ua != null) {
            if ($ua.indexOf("iPhone") >-1 || $ua.indexOf("iPad") >-1 || ($ua.indexOf("ndroid") >-1 && $ua.indexOf("WebKit") >-1)) {
                return redirect()->route('m');
    }
}
        return $next($request);
    }
}
