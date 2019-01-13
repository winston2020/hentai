<?php

namespace App\Api\Controllers;

use App\Area;
use App\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

     
    }

    public function feedback(Request $request)
    {
         $text = $request->input('text');
         if (empty($text)){
             return response()->json(['msg'=>'反馈不能为空','status'=>500]);
         }
         $feedback =  new Feedback();
         $feedback->text = $text;
         $bool = $feedback->save();
         if ($bool){
             return response()->json(['msg'=>'您的反馈我们已经接受到了','status'=>200]);
         }else{
             return response()->json(['msg'=>'数据插入失败','status'=>200]);
         }
    }

    




}
