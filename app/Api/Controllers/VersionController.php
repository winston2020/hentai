<?php

namespace App\Api\Controllers;

use App\Area;
use App\Comic;
use App\ComicImg;
use App\Http\Controllers\Controller;
use App\Series;
use App\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VersionController extends Controller
{
    public function index(Request $request)
    {
        $version = Version::find(1);
        return  response()->json(['status'=>200,'msg'=>'版本获取成功','data'=>$version]);
    }
}
