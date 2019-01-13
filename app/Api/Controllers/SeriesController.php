<?php

namespace App\Api\Controllers;

use App\Area;
use App\Comic;
use App\ComicImg;
use App\Http\Controllers\Controller;
use App\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::all();
        return response()->json(['status'=>200,'msg'=>'系列数据获取成功','data'=>$series]);
    }

    public function seriescomic(Request $request)
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
                ->select('id','name','series_id','description','author','comic_img_url','userid','created_at')
                ->get();

            if ($res->isEmpty()){
                return response()->json(['status'=>500,'msg'=>'没有漫画数据']);
            }else{
                return response()->json(['status'=>200,'msg'=>'获取漫画数据','data'=>$res]);
            }
        }else{
            $res = Comic::where('series_id',$seriesid)
                ->take($pagesize)
                ->skip($pagesize*($pagination-1))
                ->select('id','name','author','series_id','description','comic_img_url','userid','created_at')
                ->get();

            if ($res->isEmpty()){
                return response()->json(['status'=>500,'msg'=>'没有漫画数据']);
            }else{
                return response()->json(['status'=>200,'msg'=>'获取漫画数据','data'=>$res]);
            }
        }
    }
    
    public function banner()
    {
        $res =  Comic::where(['series_id'=>4,'tuijie'=>1])->get();
        if ($res->isEmpty()){
            return response()->json(['status'=>500,'msg'=>'没有漫画数据']);
        }else{
            return response()->json(['status'=>200,'msg'=>'获取漫画数据','data'=>$res]);
        }
    }
}
