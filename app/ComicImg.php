<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComicImg extends Model
{
    protected $table ='chapter_img';

    public function BelongToChapter()
    {
        $this->belongsTo(ComicChapter::class,'id','chapter_id');
    }
}
