<?php

namespace App\Api\Controllers;

use App\Area;
use App\Comic;
use App\ComicImg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComicChapterController extends Controller
{
    public function index(Request $request)
    {
        $comicid = $request->input('comicid');
        if (empty($comicid)){
            return response()->json(['status'=>500,'msg'=>'漫画id不能为空']);
        }
        $comic = Comic::select('id','name','comic_img_url','description','weekupdate','created_at','updated_at')->find($comicid);
        if (empty($comic)){
            return response()->json(['status'=>500,'msg'=>'没有漫画数据']);
        }else{
            $count = ComicImg::where(['comic_id'=>$comicid])->get()->count();
            $comic->chapter = '总一卷';
            $comic->number = $count;
            return response()->json(['status'=>200,'data'=>$comic]);
        }
    }
}
