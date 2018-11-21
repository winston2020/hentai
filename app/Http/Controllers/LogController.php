<?php

namespace App\Http\Controllers;

use App\Host;
use App\Spider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function spider(Request $request)
    {
        $host =  Host::all();
        $date = $request->input('date');
        if (empty($date)){
            $date = date('Y-m-d');
        }
        $baidu = Spider::where(['spidername'=>'Baidu'])
            ->where('created_at','like','%'.$date.'%')
            ->get()->count();
        return view('system.logs.all',compact('host','baidu','date'));
    }

    public function show(Request $request)
    {
        $host =  $request->input('host');
        $date = $request->input('date');
        if (empty($date)){
            $date = date('Y-m-d');
        }
        $baidu = Spider::where(['spidername'=>'Baidu','host'=>$host])
            ->where('created_at','like','%'.$date.'%')
            ->get();
        $host =  Host::all();
        return view('system.logs.index',compact('host','baidu'));
    }

}
