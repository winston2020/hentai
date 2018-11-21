<?php

namespace App\Http\Controllers;

use App\Comic;
use App\ComicChapter;
use App\Video;
use App\VideoChapter;

class SiteMapController extends Controller
{
    public function index($id="")
    {
        if (empty($id)){
            $id = 0;
        }else{
            $id = $id;
        }
        $comic = Comic::select('id','updated_at')->skip(($id*10000))->limit(10000)->orderBy('updated_at', 'desc')->get();

        $comicchapter = ComicChapter::select('id','updated_at')->skip(($id*10000))->limit(10000)->orderBy('updated_at', 'desc')->get();

        return response()->view('sitemap.index', [
            'comic' => $comic,
            'comicchapter'=>$comicchapter,
        ])->header('Content-Type', 'text/xml');
    }

    public function pushline()
    {
        set_time_limit(0);
        $comic = Comic::where([])->orderBy('updated_at', 'desc')->get();
        $video = Video::where([])->orderBy('updated_at', 'desc')->get();
        $comicchapter = ComicChapter::where([])->orderBy('updated_at', 'desc')->get();
        $videochapter = VideoChapter::where([])->orderBy('updated_at', 'desc')->get();

        foreach ($comic as $key=>$item){
            $url[] = 'http://www.hentaiclub.cn/comic/'.$item->id;
        }
        $res =  json_decode($this->push($url));
        if ($res->success>0){
            echo '漫画名链接全部推送成功';
            echo '<br>';
        }
        ob_flush();
        flush();

        foreach ($video as $key=>$item){
            $url[] = 'http://www.hentaiclub.cn/bangumi/'.$item->id;
        }
        $res =  json_decode($this->push($url));
        if ($res->success>0){
            echo '视频名称链接全部推送成功';
            echo '<br>';
        }
        ob_flush();
        flush();
        $ccc = array_chunk($comicchapter->toArray(),1000);

        foreach ($ccc as $key=>$item){
            foreach ($item as $val){
                $url[] = 'http://www.hentaiclub.cn/read/'.$val['id'];
            }
            $res =  json_decode($this->push($url));
        }
        if ($res->success>0){
            echo '漫画章节名称链接全部推送成功';
            echo '<br>';
        }
        ob_flush();
        flush();

        $bbb = array_chunk($videochapter->toArray(),1000);
        foreach ($bbb as $key=>$item){
            foreach ($item as $value){
                $url[$key][] = 'http://www.hentaiclub.cn/bangumi/'.$value['video_id'].'?chapter='.$value['number'];
            }
        }
        foreach ($url as $item){
            $res =  json_decode($this->push($item));
        }
        if ($res->success>0){
            echo '视频话集名称链接全部推送成功';
            echo '<br>';
        }
        ob_flush();
        flush();
        echo '<br>';
        dd($res);
    }


    public function push($url)
    {
        $token ='tEfkCmaC4cyzOhyH';
        $posturl = 'http://data.zz.baidu.com/urls?site=www.hentaiclub.cn&token=' .$token;
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $posturl,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $url),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        return $result = curl_exec($ch);
    }
    
}
