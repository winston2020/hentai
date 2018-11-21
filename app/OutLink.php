<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class OutLink extends Model
{
    public static function get()
    {
        $linkname = file(public_path('outlinkname.txt'));
        return array_random($linkname);
    }
}