<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function home()
    {
        if (Auth::check()){
            return view('admin.index');
        }else{
            return '没有权限，没有登录';
        }
    }

    public function login(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');
        $userbool = Auth::attempt(['name'=>$name,'password'=>$password,'usertype'=>1]);   $userbool = Auth::attempt(['name'=>$name,'password'=>$password,'usertype'=>1]);
        if($userbool){
            return response()->json(['status'=>200,'msg'=>'登陆成功']);
        }else{
            return response()->json(['status'=>500,'msg'=>'登录失败']);
        }
    }

    public function admin()
    {
        if (Auth::check()){
            return Redirect::to('admin/home');
        }
        return view('admin.login');
    }

    public function goout()
    {
        Auth::logout();
        return Redirect::to('admin');
    }

}
