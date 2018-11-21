<?php

namespace App\Http\Controllers;
set_time_limit(0);

use App\Comic;
use App\ComicChapter;
use App\ComicImg;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    //

    public function index()
    {
//         $a = $this->getchaperurl();
//         $this->createcomic(); //创建漫画
//         $this->createchapter('伊藤润二'); //创建章节

        $url = scandir(getcwd().'/comic');//漫画目录

        $data =  scandir(getcwd().'/comic'.'/'.$url[3]);//漫画章节
// dd($data);
        $chapterdata = array_splice($data,2,800);

       $this->createcomic();
//        $this->createchapter("里 战国银河群雄");
//        $this->createchapterimg('奴隶区',$chapterdata);
    }

    public function createcomic()
    {
        $comicname = scandir(getcwd().'/comic');//漫画目录
       // dd($comicname);
        //创建漫画


        $comicname ='堕落游戏';

//        dd($comicname);
        $comic =  new Comic();
        $comic->name = $comicname;
        $comic->author = '金贺新 Claire Team';
        $comic->conver_img_url = '..';
//        dd($comicname);
        $comic =  new Comic();
        $comic->name = $comicname;
        $comic->author = '金贺新 Claire Team';
        $comic->conver_img_url = '..';
        $comic->description = ':堕落游戏';
        $comic->tuijie = '0';
        $comic->lunbo = '0';
        $comic->star_number = '5';
        $comic->weekupdate = '连载';
        $comic->updatetime = '16:43:42';
        $comic->click_number = rand(1000,60000);
        $comic->buzz = rand(1000,50000);
        $comic->series_id = rand(1,2);
        $comic->lunbo_img_url = '..';
        $comic->tuijian_img_url="..";
        $a =$comic->save();
        if ($a){
            echo '漫画:'.$comicname. '插入成功';

            $this->createchapter($comicname);

        }else{
            echo '漫画:'.$comicname. '插入失败';
        }
    }

    public function createchapter($comicname)
    {
        $url = scandir(getcwd().'/comic');//漫画目录
     //   dd($url);
        $data =  scandir(getcwd().'/comic'.'/'.$url[3]);//漫画章节
        $chapterdata = array_splice($data,2,800);
//        dd($chapterdata);
        $comic_id = Comic::where(['name'=>$comicname])->first()->id;
        for ($i=0;$i<count($chapterdata);$i++){
            $chapter = new ComicChapter();
            $chapter->chapter = $chapterdata[$i];
            $chapter->comic_id = $comic_id;
            $chapter->number=$i;
         $a =  $chapter->save();
         if ($a){
             echo '章节:'.$chapterdata[$i]. '插入成功'.'<br>';

             flush();
         }else{
             echo '章节:'.$chapterdata[$i]. '插入失败'.'<br>';
         }

        }
        $this->createchapterimg($comicname,$chapterdata);
    }

    public function createchapterimg($comicname,$chapterdata)
    {

        for ($i=0;$i<count($chapterdata);$i++){
            $newdata[$i] = getcwd().'/comic'.'/'.$comicname.'/'.$chapterdata[$i] ; //章节地址
        }
    //    dd($newdata);
        for ($i=0;$i<count($newdata);$i++){
     //        dd($newdata);
             $imgdata[$i] = scandir($newdata[$i]); //未过滤的章节图片
        }

        for ($j=0;$j<count($imgdata);$j++){
            $imgdata[$j] = array_splice($imgdata[$j],2,800);//已过滤的章节图片
        }

        for ($i=0;$i<count($imgdata);$i++){
            for ($j=0;$j<count($imgdata[$i]);$j++){
                $imgurl[$i][$j] = $newdata[$i].'/'.$imgdata[$i][$j]; //拼接地址
                $imgurl[$i][$j] = substr($imgurl[$i][$j],31); //删除不必要的前缀字符串

                $comicimg = new ComicImg();
                $chapter = ComicChapter::where(['chapter'=>$chapterdata[$i]])->first();
                $comicimg->number = $j;
                $comicimg->comic_img_url = $imgurl[$i][$j];
                $comicimg->chapter_id = $chapter->id;
                $comicres = $comicimg->save();
                if ($comicres){
                    echo '漫画章节:'.$chapter->chapter.'第'.$j.'页'.'插入成功'.'<br>';
                }else{
                    echo '插入失败'.'<br>';
                }
                flush();
            }
        }


    }

    public function getchaperurl()
    {
        $url = scandir(getcwd().'/comic');//漫画目录
        $data =  scandir(getcwd().'/comic'.'/'.$url[3]);//漫画章节
        $data = array_splice($data,2,800);//漫画章节去掉. ..
        for ($i=0;$i<count($data);$i++){
            $newdata[$i] = getcwd().'/comic'.'/'.$url[2].'/'.$data[$i];
        }
        for ($i=0;$i<count($newdata);$i++){
            $chapterurl[$i] = substr($newdata[$i],27);
        }
        dd($chapterurl);
    }



    function flush_buffers()
    {
        ob_end_flush();
        ob_flush();
        flush();
        ob_start('ob_callback');
    }





}
