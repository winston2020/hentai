<?php

namespace App\Http\Controllers;

use App\Host;
use App\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DownController extends Controller
{

    public function index()
    {
        $host = $_SERVER['HTTP_HOST'];
        $suf = str_after($host,'www.');
        $this->tdk = Host::where(['name'=>$suf])->first();
        $tdk = $this->tdk;
        $version = Version::first();
        return view('down',compact('tdk','version'));
    }

}
