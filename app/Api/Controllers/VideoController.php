<?php

namespace App\Api\Controllers;

use App\Area;
use App\Comic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $id =  $request->input('id');
        $pagination =  $request->input('pagination');
        $pagesize =  $request->input('pagesize');
        if (empty($id)){
            return response()->json(['status'=>500,'msg'=>'id不能为空']);
        }
        if (empty($pagination)){
            return response()->json(['status'=>500,'msg'=>'页数不能为空']);
        }
        if (empty($pagesize)){
            return response()->json(['status'=>500,'msg'=>'每页数量不能为空']);
        }
        $data = DB::table('comic')
            ->take($pagesize)
            ->skip($pagesize*($pagination-1))
            ->get();
        if ($data->isEmpty()){
            return response()->json(['status'=>500,'msg'=>'没有漫画数据']);
        }else{
            return response()->json(['status'=>200,'msg'=>'获取漫画数据','data'=>$data]);
        }
    }




}
