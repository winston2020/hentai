<?php

namespace App\Http\Controllers;

use App\Host;
use App\Keyword;
use App\Video;
use App\VideoChapter;
use App\VideoTag;
use App\VideoToTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class VideoController extends Controller
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
        $data = Video::getvideo();
        return view('video.index',compact('tdk','data'));
    }

    public function show(Request $request, $id)
    {
        $chapter =  $request->input('chapter');
        if (!empty($chapter)){
            $currentvideochapter = VideoChapter::where(['video_id'=>$id,'number'=>$chapter])->first();
        }else{
            $currentvideochapter = VideoChapter::where(['video_id'=>$id])->first();
        }
        $tdk = $this->tdk;
        $video = Video::find($id);
        if (empty($video)){
           return view(404,compact('tdk'));
        }
        $videochapter = VideoChapter::where(['video_id'=>$id])->orderby('number')->get();
        return  view('video.show',compact('tdk','video','videochapter','currentvideochapter'));
    }

    public function videotag($id)
    {
        $tdk = $this->tdk;
        $tag = VideoTag::where(['en_name'=>$id])->first();
        $tagarrid = VideoToTag::where(['tag_id'=>$tag->id])->select('video_id')->get()->toArray();
        $id = array_column($tagarrid, 'video_id');
        $fenye = Video::whereIn('id',$id)->paginate(32);
        $data = array_chunk($fenye->toArray()['data'], 4);
        return  view('video.list',compact('tdk','data','fenye','tag'));
    }

    public function timeline()
    {
        $tag = VideoTag::where(['tag_type'=>1])->get()->toArray();
        $tagid = array_column($tag, 'id');
        $fenye = VideoTag::whereIn('tag_id',$tagid)->select('video_id')->get();
        $data = array_chunk($fenye->toArray()['data'], 4);
        return view('video.timeline');
    }

    public function adminlist()
    {
        $data = Video::where([])->paginate(15);
        return view('admin.video.list',compact('data'));
    }

    public function add()
    {
        return view('admin.video.add');
    }

    public function doadd(Request $request)
    {
        $tagid = $request->input('tagid');
        $video = new Video();
        $video->name = $request->input('name');
        $video->description = $request->input('description');
        $video->video_cover_img_url = $request->input('video_cover_img_url');
        $video->current_number = $request->input('current_number');
        $video->all_number = $request->input('all_number');
        $video->video_update_time = $request->input('video_update_time');
        $video->video_type_id = $request->input('video_type_id');
        $video->userid = Auth::user()->id;
        $bool =  $video->save();
        if ($bool){
            foreach ($tagid as $item){
                $tag = new VideoToTag();
                $tag->video_id = $video->id;
                $tag->tag_id  = $item;
                $tag->save();
            }
            echo '电影新增成功,自行关闭当前页面';
        }else{
            echo '电影新增失败,自行联系JOJO';
        }
    }

    public function adminchapter($id)
    {
        $data = VideoChapter::where(['video_id'=>$id])->paginate(15);
        return view('admin.video.chapterlist',compact('data'));
    }


    public function adminupdate(Request $request)
    {
        $id = $request->input('id');
        $data =  Video::find($id);
        return view('admin.video.update',compact('data'));
    }


    public function doadminupdate(Request $request)
    {
        $id = $request->input('id');
        $tagid = $request->input('tagid');
        $video =  Video::find($id);
        $video->name = $request->input('name');
        $video->description = $request->input('description');
        $video->video_cover_img_url = $request->input('video_cover_img_url');
        $video->current_number = $request->input('current_number');
        $video->all_number = $request->input('all_number');
        $video->video_update_time = $request->input('video_update_time');
        $video->video_type_id = $request->input('video_type_id');
        $video->userid = Auth::user()->id;
        $bool =  $video->save();
        if ($bool){
            DB::table('video_tagtovideo')->where(['video_id'=>$id])->delete();
            foreach ($tagid as $item){
                    $tag = new VideoToTag();
                    $tag->video_id = $video->id;
                    $tag->tag_id  = $item;
                    $tag->save();
            }
            echo '电影修改成功,自行关闭当前页面';
        }else{
            echo '电影修改失败,自行联系JOJO';
        }
    }

    public function doadmindelete(Request $request)
    {
        $id =  $request->input('id');
        $bool =  DB::table('videos')->where(['id'=>$id])->delete();
        if ($bool){
            $bool =  DB::table('video_tagtovideo')->where(['video_id'=>$id])->delete();
            if ($bool){
                echo '視頻和標籤外鍵刪除成功';
            }else{
                echo '視頻和標籤外鍵刪除失敗';
            }
        }else{
            echo '視頻和標籤外鍵刪除失敗';
        }
    }

    public function upload(Request $request)
    {
        $status = 0;
        $data = [];
        if ($request->method()== 'POST') {
            $date = date('Ymd');
            $path = $request->file('file')->store('', 'upload');
            if ($path){
                $fileUrl = '/upload/videocover/'.$date.'/'.$path;
                $status = 1;
                $data['url'] = $fileUrl;
                $message = '上传成功';
            }else{
                $message = "上传失败";
            }
        } else {
            $message = "参数错误";
        }
        return self::showMsg($status, $message,$data);
    }

    function showMsg($status,$message = '',$data = array()){
        $result = array(
            'status' => $status,
            'message' =>$message,
            'data' =>$data
        );
        exit(json_encode($result));
    }


}
