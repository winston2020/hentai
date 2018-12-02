<?php

namespace App\Http\Middleware;

use App\Spider;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ReturnStatus
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
        $host = $_SERVER['HTTP_HOST'];
        $path = $_SERVER['REQUEST_URI'];

        preg_match('/(.*\.)?\w+\.\w+$/', $host, $matches);
        $hassbool = array_key_exists(1,$matches);
        if ($hassbool){
            if ($matches[1]!='www.'){
                return redirect()->to('http://'.$matches[0].$path);
            }
        }else{
            return redirect()->to('http://www.'.$matches[0].$path);
        }

        $outlink = Storage::allfiles('outlink');
        foreach ($outlink as $item){
            $datalink[] = file(public_path($item));
        }
        $arr = self::arrToOne($datalink);
        $outlink = array_random($arr,20);
        foreach ($outlink as $key=>$item){
            $newlink[$key]['url'] = $item;
            $newlink[$key]['name'] = \App\OutLink::get();
        }
        if (empty(Cache::get($host.$path))){
            Cache::add($host.$path, $newlink,10080);
        }
        return $next($request);
    }

    function arrToOne($multi) {
        $arr = array();
        foreach ($multi as $key => $val) {
            if( is_array($val) ) {
                $arr = array_merge($arr, self::arrToOne($val));
            } else {
                $arr[] = $val;
            }
        }
        return $arr;
    }

}