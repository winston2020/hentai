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
        $hot = Comic::orderby('click_number')->select('id','name','author','comic_img_url')->take(6)->get();
        $res = DB::table('comic')
            ->take(12)
            ->where(['tuijie'=>1])
            ->select('id','name','series_id','author','comic_img_url','userid','created_at')
            ->get();
        if ($res->isEmpty()){
            return response()->json(['status'=>500,'msg'=>'没有漫画数据']);
        }else{
            return response()->json(['status'=>200,'msg'=>'获取漫画数据','data'=>$res,'hot'=>$hot]);
        }
    }

    public function banner()
    {
        $res = DB::table('comic')
            ->where(['lunbo'=>1])
            ->select('id','name','author','comic_img_url','created_at')
            ->get();
        return response()->json(['status'=>200,'msg'=>'banner数据获取成功','data'=>$res]);
    }
}
