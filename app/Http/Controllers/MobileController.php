<?php

namespace App\Http\Controllers;

use App\Comic;
use App\ComicChapter;
use App\ComicImg;
use App\Host;
use App\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobileController extends Controller
{
    public function __construct()
    {
        $host = $_SERVER['HTTP_HOST'];
        $suf = str_after($host,'www.');
        $this->tdk = Host::where(['name'=>$suf])->first();
    }

    public function index()
    {
        $tdk = $this->tdk;
        $all =  Comic::orderBy('id','desc')->get();
        $tuijian = Comic::where(['tuijie'=>1])->take(6)->get();
        $lunbo = Comic::where(['lunbo'=>1])->take(6)->get();
        $lifan = Comic::where(['series_id'=>1])->take(6)->get();
        $rankings = Comic::where(['rankings'=>1])->take(6)->get();
        return view('M.index',compact('all','tuijian','lifan','rankings','lunbo','tdk'));
    }

    public function getnewdata()
    {
        $newdata = Comic::orderBy('created_at','desc')->take(6)->get();
        return $newdata;
    }

    public function gettagdata(Request $request)
    {
        $startid = $request->input('start');
        if($startid!=0){
            $comic = Comic::where('id','>',$startid)->take(9)->get()->toJson();
            return $comic;

        }
    }

    public function comiclist($id)
    {
        $tdk = $this->tdk;
        $comic =  Comic::find($id);
        $chaper =  ComicChapter::where(['comic_id'=>$id])->get();
        return view('M.list',compact('comic','chaper','tdk'));
    }

    public function read($id,$cid)
    {
        $tdk = $this->tdk;
        $comicchapter = ComicChapter::find($id);
        if (empty($comicchapter)) {
            return '章节不存在';
        }else {
            $comic = Comic::find($comicchapter->comic_id);
            $comicimg = ComicImg::where(['chapter_id' => $id])->get();
            $chapter = ComicChapter::where(['comic_id'=>$cid])->get();
//          $lastdata = ComicChapter::where(['comic_id'=>$cid,'number'=>$chapter->number+1])->first();

            return view('M.show', compact('tdk','comicimg', 'comicchapter', 'comic', 'chapter', 'lastdata','id','cid'));
        }
    }

    public function search(){
        $tdk = $this->tdk;
        $othoercomic = Comic::where([])->orderBy(DB::raw('RAND()'))->take(9)->get();
        return view('M.search',compact('tdk','othoercomic'));
    }

    public function searchdata($id){
        $tdk = $this->tdk;
        if (empty($id)){
            return view('404');
        }
        $res =  Comic::where('name','like','%'.$id.'%')->get();

        return view('M.searchres',compact('tdk','res','id'));
    }
}
