<?php

namespace App\Http\Controllers;

use App\Comic;
use App\ComicChapter;
use App\ComicImg;
use App\ComicTag;
use App\Host;
use App\Series;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Facades\Agent;

class HomeController extends Controller
{
    public function __construct()
    {
        $host = $_SERVER['HTTP_HOST'];
        $suf = str_after($host,'www.');
        $this->tdk = Host::where(['name'=>$suf])->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tdk = $this->tdk;
        $lunbo = Comic::where(['lunbo'=>1])->take(5)->get();
        $newdata = Comic::orderBy('created_at','desc')->take(8)->get();
        $seriesres = Series::all();
        foreach ($seriesres as $key => $item){
            $seriesdata[$key]['series']= $item->name;
            $seriesdata[$key]['enname']= $item->enname;
            $seriesdata[$key]['data'] = Comic::where(['series_id'=>$item->id])
                ->join('series', 'comic.series_id', '=', 'series.id')
                ->limit(8)
                ->orderby('comic.created_at','desc')
                ->select('comic.name','comic.comic_img_url','comic.userid','comic.id')
                ->get();
            $seriesdata[$key]['data'] = array_chunk($seriesdata[$key]['data']->toArray(), 4);
        }
        $nav = Series::all();
        return view('comic.index',compact('tdk','lunbo','tuijian','newdata','seriesdata','nav'));
    }

    function object_to_array($obj){
        $_arr=is_object($obj)?get_object_vars($obj):$obj;
        foreach($_arr as $key=>$val){
            $val=(is_array($val))||is_object($val)?self::object_to_array($val):$val;
            $arr[$key]=$val;
        }
        return $arr;
    }

    public function type($type)
    {
        $tag = Tag::where(['en_name'=>$type])->first();
        if (empty($tag)){
            return view('404');
        }
        $dataid =  ComicTag::where(['tag_id'=>$tag->id])->select('comic_id')->get()->toArray();
        $id = array_column($dataid, 'comic_id');
        $fenye = Comic::whereIn('id',$id)->paginate(32);
        $data = array_chunk($fenye->toArray()['data'], 4);
        $nav = Series::all();
        return view('comic.list',compact('fenye','data','tag','nav'));
    }

    public function series($series)
    {
        $tdk = $this->tdk;
        if (empty($series)){
            return view('404');
        }
        if ($series=='new'){
            $tag = new \stdClass();
            $tag->tag = '最新漫画';
            $fenye = Comic::where([])->orderby('created_at','desc')->paginate(32);
            $data = array_chunk($fenye->toArray()['data'], 4);
        }else{
            $series = Series::where(['enname'=>$series])->first();
            $fenye = Comic::where(['series_id'=>$series->id])->paginate(32);
            $data = array_chunk($fenye->toArray()['data'], 4);
        }
        $nav = Series::all();
        return view('comic.list',compact('tdk','fenye','data','series','nav'));
    }

    public function search($data)
    {
        $tdk = $this->tdk;
        if (empty($data)){
            return view('404',compact('tdk'));
        }
        $fenye =  Comic::where('name','like','%'.$data.'%')->paginate(32);
        $comicdata = array_chunk($fenye->toArray()['data'], 4);
        $nav = Series::all();
        return view('search',compact('comicdata','fenye','videodata','tdk','nav'));
    }

    public function page404()
    {
        $tdk = $this->tdk;
        $nav = Series::all();
        return view('404',compact('tdk','nav'));
    }

    public function gettagdata(Request $request)
    {
        $id = $request->input('id');
        $startid = $request->input('startid');
        if ($id==0){
            $where =[];
            $tagdata = Comic::where($where)->orderBy('id','desc')->get()->toJson();
        }else{
            $where=['tag_id'=>$id];
            $comicid =  ComicTag::where($where)->select('comic_id')->get()->toArray();
            $tagdata = Comic::find($comicid);
         }

         return $tagdata;
    }

    public function getmoredata(Request $request)
    {
        $startid = $request->input('startid');
        $id = $request->input('id');
        if ($id==0){
            $tagdata = Comic::where('id','<',$startid)->orderBy('id','desc')->take(18)->get()->toJson();
        }else{
            $where=['tag_id'=>$id];
            $comicid =  ComicTag::where($where)->select('comic_id')->get()->toArray();
            $tagdata = Comic::find($comicid);
        }
        return $tagdata;
    }

    public function weihu()
    {
        return  view('404');
    }

    public function chapter($account)
    {
        $tdk = $this->tdk;
        $comic =  Comic::find($account);

        $chaperdata = ComicChapter::where(['comic_chapter.comic_id'=>$comic->id,'chapter_img.number'=>1])
            ->join('chapter_img', 'comic_chapter.id', '=', 'chapter_img.chapter_id')
            ->orderby('comic_chapter.number')
            ->select('comic_chapter.chapter','comic_chapter.number','comic_chapter.id','chapter_img.comic_img_url','comic_chapter.created_at')
            ->get();
        $chaper = array_chunk($chaperdata->toArray(), 4);
        $nav = Series::all();
        return view('comic.comicinfo',compact('tdk','comic','chaper','nav'));
    }

    public function fanchapter($account)
    {
        $tdk = $this->tdk;
        $comic =  Comic::where(['rename'=>$account])->first();
        $chaperdata = ComicChapter::where(['comic_id'=>$comic->id,'chapter_img.number'=>1])
            ->join('chapter_img', 'comic_chapter.id', '=', 'chapter_img.chapter_id')
            ->get();
        $chaper = array_chunk($chaperdata->toArray(), 4);
        $nav = Series::all();
        return view('comic.comicinfo',compact('tdk','comic','chaper','nav'));
    }

    public function read($id)
    {
        $tdk = $this->tdk;
        $comicchapter = ComicChapter::find($id);
        if (empty($comicchapter)) {
            return  view('404',compact('tdk'));
        }
        if (Agent::isMobile()){
            $comic = Comic::find($comicchapter->comic_id);
            $comicimg = ComicImg::where(['chapter_id' => $id])->get();
            $chapter =  ComicChapter::where(['comic_id'=>$comicchapter->comic_id])->get();
            $chapterdata =  ComicChapter::find($id);
            $befordata = ComicChapter::where(['comic_id'=>$chapterdata->comic_id,'number'=>$comicchapter->number-1])->first();
            $lastdata = ComicChapter::where(['comic_id'=>$chapterdata->comic_id,'number'=>$chapterdata->number+1])->first();
            return view('comic.mread', compact('comicimg', 'comicchapter','befordata', 'comic', 'chapter', 'lastdata','id','tdk'));
        } else {
            $comic = Comic::find($comicchapter->comic_id);
            $comicimg = ComicImg::where(['chapter_id' => $id])->get();
            $befordata = ComicChapter::where(['comic_id'=>$comicchapter->comic_id,'number'=>$comicchapter->number-1])->first();
            $lastdata = ComicChapter::where(['comic_id'=>$comicchapter->comic_id,'number'=>$comicchapter->number+1])->first();
            $nav = Series::all();
            return view('comic.read', compact('tdk','comicimg', 'comicchapter', 'comic', 'befordata', 'lastdata','nav'));
        }
    }

    public function getchapterdata(Request $request)
    {
        $comicid = $request->input('comicid');
        $index = $request->input('index');
        return ComicChapter::HasManyImg($comicid,$index);
    }

    public function duty()
    {
        return view('duty');
    }

    public function about()
    {
        return view('about');
    }

    public function seturl()
    {
        $url = file(public_path('url.txt'));
        $comic = Comic::select('name')->get()->toArray();
        foreach ($comic as $item){
           $comiczz[] = $item['name'];
        }

        foreach ($url as $key=>$item){
            $comicdata =  array_random($comiczz,6);
            $comicres = implode($comicdata,',');
            $comicreszzz = implode($comicdata,'漫画,');
            $data[$key]['name'] = str_replace(array("\r\n", "\r", "\n"), "", $item);
            $data[$key]['title'] = str_before($item,'.').'漫画网';
            $data[$key]['description'] = str_before($item,'.').'漫画网致力于打造国内最全最新的的漫画阅读平台,'.'免费提供'.$comicres.'等漫画观看,看漫画就上'.str_before($item,'.').'漫画网';
            $data[$key]['keyword'] = $comicreszzz.','.str_before($item,'.').'漫画网';
            $data[$key]['created_at'] = date('Y-m-d H:i:s');
            $data[$key]['updated_at'] = date('Y-m-d H:i:s');
            $data[$key]['ad1_img_url'] = "/ad/ad".rand(1,2).".jpg";
            $data[$key]['header_img_url'] ='/header/'.rand(1,3).'.jpg';
            $data[$key]['ad2_img_url'] = "/ad/ad".rand(1,2).".jpg";
        }
        $res = DB::table('host')->insert($data);
    }

    public function getcomic()
    {
        $res = Comic::find(1);
        return $res;
    }


}
