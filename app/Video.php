<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table ='videos';

    public static function getvideo()
    {
        $type =  VideoType::all();
        foreach ($type as $key => $item){
            $data[$key] =  Video::where(['video_type_id'=>$item->id])->take(6)->get();
        }
        return $data;
    }
}
