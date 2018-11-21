<?php

namespace App\Api\Controllers;

use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $area =  Area::all();
        if ($area->isEmpty()){
            return response()->json(['status'=>500,'msg'=>'没有地区信息']);
        }else{
            return response()->json(['status'=>200,'msg'=>'城获取信息','data'=>$area]);
        }
    }




}
