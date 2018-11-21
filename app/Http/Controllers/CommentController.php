<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Host;
use App\Keyword;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function __construct()
    {
        $host = $_SERVER['HTTP_HOST'];
        $suf = str_after($host,'www.');
        $this->tdk = Host::where(['name'=>$suf])->first();
    }

    public function comment(Request $request)
    {
        $content = $request->input('comment');
        $videoid = $request->input('videoid');
        $parent_floor_id = $request->input('parent_floor_id');
        $userid = $request->input('userid');
        if (empty($content)){
            echo '(ﾉ"◑ ◑)ﾉ"(｡•́︿•̀｡),';
        }

        $comment =  new Comment();
        $comment->body = $content;
        $comment->video_id = $videoid;
        $comment->user_id = $userid;
        $comment->parent_floor_id = $parent_floor_id;
        $bool = $comment->save();
        if ($bool){
            return $comment->body;
        }else{
            return '<li class="comment byuser comment-author-hentaione even thread-even depth-1" id="li-comment-25670">
            <article id="comment-25670" class="comment">
			<div class="avatar-wrap">
			<img src="/default.jpg" alt height="132" width="132" class="avatar">			</div>
			<div class="comment-meta comment-author">
				<cite class="fn"><a href="/u/">hentaione</a></cite> <span class="floor"></span>
				<span class="comment-edit">
                                        </span>
				<div class="comment-content">
										<p>求更新</p>
				</div><!-- .comment-content -->
            </div><!-- .comment-meta -->
		</article><!-- #comment-## -->
    <!-- edit end -->
';
        }
    }
}
