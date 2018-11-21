<?php

namespace App\Console\Commands;

use App\Comic;
use App\ComicChapter;
use App\ComicImg;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Ehentai extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Ehentai:createchapter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建ehentai 章节';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $res = Comic::where(['series_id'=>4])->get();
        foreach ($res as $key=>$item){
            $chapter = new ComicChapter();
            $chapter->number = 1;
            $chapter->chapter = $item->name;
            $chapter->comic_id = $item->id;
            $chapter->created_at = date('Y-m-d');
            $chapter->updated_at = date('Y-m-d');
            $bool = $chapter->save();
            if ($bool){
                $this->info('comic=>'.$item->name.',status=>'.$bool.'msg=>章节创建成功'.PHP_EOL);
            }else{
                $this->info('comic=>'.$item->name.',status=>'.$bool.'msg=>章节创建失败'.PHP_EOL);
            }
            $imgdata = ComicImg::where(['comic_id'=>$item->id])->get();
            if (!$imgdata->isEmpty()){
                foreach ($imgdata as $item1){
                    $img =  ComicImg::find($item1->id);
                    $img->chapter_id = $chapter->id;
                    $save = $img->save();
                    if ($save){
                        $this->info('   comic=>'.$item->name.',status=>'.$bool.'msg=>图片章节id更新成功'.PHP_EOL);
                    }else{
                        $this->info('   comic=>'.$item->name.',status=>'.$bool.'msg=>图片章节id更新失败'.PHP_EOL);
                    }
                }
            }
        }
    }
}
