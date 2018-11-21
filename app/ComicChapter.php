<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ComicChapter extends Model
{
    protected $table = 'comic_chapter';

    public  static function HasManyImg($id,$index)
    {
        return DB::table('comic_chapter')
            ->where(['comic_chapter.comic_id'=>$id,'chapter_img.number'=>1])
            ->join('chapter_img', 'comic_chapter.id', '=', 'chapter_img.chapter_id')
            ->orderBy('comic_chapter.number')
            ->skip(20*($index-1))
            ->take(20)
            ->select(
                              'comic_chapter.comic_id',
                              'comic_chapter.number',
                              'comic_chapter.chapter',
                              'chapter_img.id',
                              'chapter_img.chapter_id',
                              'chapter_img.comic_img_url'
                )
            ->get();
    }
}
