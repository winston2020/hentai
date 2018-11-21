<?php

namespace App\Http\Controllers;

use App\Host;
use App\Keyword;
use App\Page;
use App\User;

class PageController extends Controller
{

    function __construct()
    {
        $host = $_SERVER['HTTP_HOST'];
        $suf = str_after($host,'www.');
        $this->tdk = Host::where(['name'=>$suf])->first();
    }

    public function index()
    {
        $tdk = $this->tdk;
        $fenye = Page::where([])->paginate(32);
        $data = array_chunk($fenye->toArray()['data'], 4);
        return view('page.list',compact('fenye','data','tdk'));
    }

    public function show($id){
       $tdk = $this->tdk;
       $data = Page::find($id);
       if (empty($data)){
           return view('404','tdk');
       }
       return view('page.show',compact('data','tdk'));
    }

}
