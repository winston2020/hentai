<?php

namespace App\Api\Controllers;

use App\Area;
use App\Comic;
use App\Http\Controllers\Controller;
use App\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $data =  Series::where('id','>','3')->get();
        if ($data->isEmpty()){
            return response()->json(['status'=>500,'msg'=>'没有系列数据']);
        }else{
            return response()->json(['status'=>200,'msg'=>'数据获取成功','data'=>$data]);
        }

    }




}
