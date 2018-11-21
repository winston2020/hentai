<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
     protected $table = "comic";

     public function Tag()
     {
         return $this->belongsToMany(Tag::class, 'comic_tag',  'comic_id','tag_id');
     }



}
