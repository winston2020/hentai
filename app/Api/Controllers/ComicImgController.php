<?php

namespace App\Api\Controllers;

use App\Area;
use App\Comic;
use App\ComicImg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComicImgController extends Controller
{
    public function index(Request $request)
    {
        $comicid = $request->input('comicid');
        if (empty($comicid)){
            return response()->json(['status'=>500,'msg'=>'漫画id不能为空']);
        }
        $res = ComicImg::select('id','number','comic_img_url','comic_id','updated_at','created_at')->where(['comic_id'=>$comicid])->get();
        if ($res->isEmpty()){
            return response()->json(['status'=>500,'msg'=>'没有漫画数据']);
        }else{
            return response()->json(['status'=>200,'data'=>$res,'msg'=>'数据获取成功']);
        }
    }

}
