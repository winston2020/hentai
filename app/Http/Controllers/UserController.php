<?php

namespace App\Http\Controllers;

use App\Host;
use App\Keyword;
use App\Liuyan;
use App\Series;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    function __construct()
    {
        $host = $_SERVER['HTTP_HOST'];
        $suf = str_after($host,'www.');
        $this->tdk = Host::where(['name'=>$suf])->first();
    }


    public function login(Request $request)
    {
        $name =  $request->input('name');
        $password =  $request->input('password');
        if (empty($name)){
            return response()->json(['status'=>500,'msg'=>'用户名不能为空']);
        }
        if (empty($password)){
            return response()->json(['status'=>500,'msg'=>'密码不能为空']);
        }
        $userbool = Auth::attempt(['name'=>$name,'password'=>$password]);
        if ($userbool){
            return response()->json(['status'=>200,'msg'=>'登录成功']);
        }else{
            return response()->json(['status'=>500,'msg'=>'登录失败']);
        }
    }

    public function register(Request $request)
    {
        $name =  $request->input('name');
        $password =  $request->input('password');
        $email=  $request->input('email');
        if (empty($name)){
            return response()->json(['status'=>500,'msg'=>'用户名不能为空']);
        }
        if (empty($password)){
            return response()->json(['status'=>500,'msg'=>'密码不能为空']);
        }
        if (empty($email)){
            return response()->json(['status'=>500,'msg'=>'密码不能为空']);
        }
        $userdata =  User::where(['name'=>$name])->first();
        if (!empty($userdata)){
            return response()->json(['status'=>500,'msg'=>'用户名已经注册']);
        }
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $bool = $user->save();
        if ($bool){
            Auth::loginUsingId($user->id);
            return response()->json(['status'=>200,'msg'=>'创建成功']);
        }else{
            return response()->json(['status'=>500,'msg'=>'创建失败']);
        }
    }

    public function goout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public  function index($id)
    {
        $tdk = $this->tdk;
        $nav = Series::all();
        if (empty($id)){
            return view('404',compact('tdk','nav'));
        }
        $user =  User::where(['id'=>$id])->first();
        if (empty($user)){
            return view('404',compact('tdk','nav'));
        }

        return view('user.index',compact('user','tdk','nav'));
    }

    public function loginview()
    {
        $tdk = $this->tdk;
        $user =null;
        $nav = Series::all();
        return view('user.index',compact('tdk','user','nav'));
    }

    public function liuyan(Request $request)
    {
        $data = $request->input('content');
        $liuyan = new Liuyan();
        $liuyan->userid = Auth::user()->id;
        $liuyan->content = $data;
        $bool = $liuyan->save();
        if ($bool){
            return \response()->json(['status'=>200,'留言成功']);
        }else{
            return \response()->json(['status'=>500,'留言失败']);

        }
    }
    
}
