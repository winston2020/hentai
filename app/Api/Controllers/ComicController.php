<?php

namespace App\Api\Controllers;

use App\Area;
use App\Comic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComicController extends Controller
{
    public function index(Request $request)
    {
        $seriesid = $request->input('seriesid');
        $pagination =  $request->input('pagination');
        $pagesize =  $request->input('pagesize');
        if (empty($pagination)){
            return response()->json(['status'=>500,'msg'=>'页数不能为空']);
        }
        if (empty($pagesize)){
            return response()->json(['status'=>500,'msg'=>'每页数量不能为空']);
        }

        if (empty($seriesid)){
            $res = DB::table('comic')
                ->take($pagesize)
                ->skip($pagesize*($pagination-1))
                ->select('id','name','series_id','author','comic_img_url','userid','created_at')
                ->get();
            $data = array_chunk($res->toArray(), 4);
            if ($res->isEmpty()){
                return response()->json(['status'=>500,'msg'=>'没有漫画数据']);
            }else{
                return response()->json(['status'=>200,'msg'=>'获取漫画数据','data'=>$data]);
            }
        }else{
            $res = Comic::where('series_id',$seriesid)
                ->take($pagesize)
                ->skip($pagesize*($pagination-1))
                ->select('id','name','author','series_id','comic_img_url','userid','created_at')
                ->get();
            $data = array_chunk($res->toArray(), 4);
            if ($res->isEmpty()){
                return response()->json(['status'=>500,'msg'=>'没有漫画数据']);
            }else{
                return response()->json(['status'=>200,'msg'=>'获取漫画数据','data'=>$data]);
            }
        }
    }
}
