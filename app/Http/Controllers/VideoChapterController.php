<?php

namespace App\Http\Controllers;

use App\Keyword;
use App\Video;
use App\VideoChapter;
use Illuminate\Http\Request;


class VideoChapterController extends Controller
{
    public function index($id)
    {
        $data = VideoChapter::where(['video_id'=>$id])->paginate(15);
        return view('admin.videochapter.list',compact('data','id'));
    }

    public function add(Request $request)
    {
        $videoid = $request->input('videoid');
        return view('admin.videochapter.add',compact('data','videoid'));
    }

    public function doadd(Request $request)
    {
        $video = new VideoChapter();
        $video->video_id = $request->input('video_id');
        $video->name = $request->input('name');
        $video->description = $request->input('description');
        $video->cover_img_url = $request->input('cover_img_url');
        $video->number = $request->input('number');
        $video->video_url = $request->input('video_url');
        $bool =  $video->save();
        if ($bool){
            echo '章节新增成功,自行关闭当前页面';
        }else{
            echo '章节新增失败,自行联系JOJO';
        }
    }

    public function upload(Request $request)
    {
        $status = 0;
        $data = [];
        if ($request->method()== 'POST') {
            $date = date('Ymd');
            $path = $request->file('file')->store('', 'chaptercover');
            if ($path){
                $fileUrl = '/upload/chaptercover/'.$date.'/'.$path;
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
