@extends('layout.video')
@section('title',$video->name.'-'.$tdk->title)
@section('keywords',$video->name.','.'第'.$video->current_number.'集,'.$video->author.','.$video->keywords.','.$video->created_at)
@section('description',$video->description)
@section('content')
    <div id="shadow"></div>
    <div id="player">
        <script language="javascript">
            $(document).ready(function() { $(".lightSwitcher").click(function() { $("#shadow").toggle(); if ($("#shadow").is(":hidden")) $(this).html("关灯").removeClass("turnedOff");
            else $(this).html("开灯").addClass("turnedOff"); }); });
        </script>
        <div class="container">
            <h1 class="video-title">{{$video->name}}【第{{$currentvideochapter->number}}集】</h1>
            <div class="smxx">
                <span class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
                    <a href="{{url('')}}" rel="v:url" property="v:title">主页</a> \
                    <span typeof="v:Breadcrumb">
                        <a rel="v:url" property="v:title" href="{{url('bangumi')}}">{{\App\VideoType::find($video->video_type_id)->name}}</a>
                    </span> \
                </span>
                <span class="vcard author">
                    <span class="fn">
                        <a href="{{url('u')}}/{{\App\User::find($video->userid)->name}}" title="由{{\App\User::find($video->userid)->name}}发布" rel="author">{{\App\User::find($video->userid)->name}}</a>
                    </span>
                </span> \ 发布于 <span class="item-date"><span class="post-date updated">{{$video->created_at}}</span></span>
                {{--\ 25条评论 \ --}}
                <div id="wxxjh" style="padding:10px 15px 10px 15px;line-height:16px;font-size:18px;margin-top:14px;background-color:#feffc9;border:1px dashed #ffe3a8;color:#f98e04;display:none;">小提醒：遇到黑屏(无限小菊花)时，点击查看解决方案
                    <a href="#" >火狐</a>/
                    <a href="{{url('')}}" >谷歌</a>
                </div>
                {{--<img title="广告位招租" src="#" width="1140" height="100" style="border:0px;">--}}
            </div>

            <div class="video-player">
                <div class="player-content">
                    <div id="player-embed">
                        <iframe marginwidth="0" marginheight="0" src="{{$currentvideochapter->video_url}}" frameborder="no" allowfullscreen="true" width="900" scrolling="no" height="434"></iframe>
                    </div>
                    <div id="float_show">
                        <div class="float_div"><span class="guandeng"><a id="command" class="lightSwitcher" href="{{url('bangumi')}}/{{$video->id}}#play_ren">关灯</a></span></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="video-toolbar" class="light-div">
        <div class="container">
            <div class="video-toolbar-inner">
                <div class="video-toolbar-item like-dislike pull-right">
                    <div class="watch-action">
                        <div class="watch-position align-left">
                            <div class="postlist-meta-collect collect-btn collect-no" style="float:right;cursor:default;" title="必须登录才能投萌币"><i class="fa fa-heart"></i> 绅士币 <span>66</span>&nbsp;</div>
                            <div class="postlist-meta-collect collect-btn collect-no" style="float:right;cursor:default;" title="必须登录才能收藏"><i class="fa fa-star"></i> 收藏 <span>43</span>&nbsp;</div>
                        </div>
                    </div>
                </div>
                <div class="video-toolbar-item tm-share-this collapsed" data-toggle="collapse" data-target="#tm-share"> <span class="maincolor2hover"> 选集/线路 </span> </div>
                <div class="tm-share-inner social-links">
                    <div class="social-share"></div>

                    <!--  css & js -->
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/css/share.min.css">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/js/social-share.min.js"></script>
                </div>
                <div class="clearfix"></div>
                <div id="tm-share" class="collapse">
                    <div class="tm-multilink">
                        <div class="multilink-table-wrap">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td width="140" class="multilink-title">桜都/简体</td>
                                    <td>
                                        @foreach($videochapter as $item)
                                        <a class="multilink-btn btn btn-sm btn-default bordercolor2hover bgcolor2hover " href="{{url('bangumi')}}/{{$item->video_id}}?chapter={{$item->number}}"><i class="fa fa-play-circle"></i> 第{{$item->number}}话 </a>
                                        @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="like-bar"><span style="width:100%"></span></div>
        </div>
    </div>
    <div id="body">
        <div class="container">
            {{--<a href="{{url('')}}/html/ad3.html" >--}}
                {{--<img title="请求支援" src="{{$video->video_cover_img_url}}" width="1140" height="100" style="border:0px;margin-bottom:5px;">--}}
            {{--</a>--}}
            <div class="row">
                <div id="content" class="col-md-9" role="main">
                    <article class="video-item single-video-view post-41273 post type-post status-publish format-video has-post-thumbnail hentry category-bangumi category-tuijian tag-9405 tag-503 tag-9162 tag-9414 post_format-post-format-video">
                        <div class="video-conent">
                            <div class="item-tax-list">
                                <div><strong>TAG / </strong>
                                    @foreach(\App\VideoToTag::where(['video_id'=>$video->id])->get() as $item)
                                    <a href="{{url('video')}}/{{\App\VideoTag::find($item->tag_id)->en_name }}" rel="tag">{{\App\VideoTag::find($item->tag_id)->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="item-content toggled">
                                {{$video->description}}
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </article>
                    <div id="comments">
                        <div id="comments" class="comments-area">
                            <h4 class="count-title" >0 条评论</h4>
                            <div class="comment-form-tm">
                                <div id="respond" class="comment-respond">
                                    <h3 id="reply-title" class="comment-reply-title"> </h3>
                                    <div class="author-current"> <img src="{{url('5dm/img/default_avatar.jpg')}}" alt="" height="132" width="132" class="avatar"> </div>
                                    <form action="{{url('')}}" method="post" id="commentform" class="comment-form">
                                        <p class="comment-form-comment">
                                            @if(\Illuminate\Support\Facades\Auth::check())
                                            <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"  placeholder="看完后有什么想说喃~"></textarea>
                                            @else
                                            <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" disabled placeholder="评论功能暂停使用"></textarea>
                                        @endif
                                        <div id="error" style="display: none;">#</div>
                                        </p>
                                        <div class="cm-form-info">
                                            <div class="row comment-author-field collapse">
                                                <div class="col-md-4">
                                                    <p class="comment-form-author">
                                                        <input id="author" name="author" type="text" placeholder="您的姓名" value="" size="30" aria-required="true">
                                                    </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="comment-form-email">
                                                        <input id="email" placeholder="您的电子邮箱" name="email" type="text" value="" size="30" aria-required="true">
                                                    </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="comment-form-url">
                                                        <input id="url" placeholder="你的个人主页" name="url" type="text" value="" size="30">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="form-submit form_heig">
                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                <input name="submit" type="submit" id="comment-submit" value="提交">
                                                <input type="hidden" name="" value="" id="comment_post_ID">
                                                <input type="hidden" name="videoid" value="{{$video->id}}" >
                                                <input type="hidden" name="userid" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" >
                                                <input type="hidden" name="comment_parent" id="comment_parent" value="0"> <small id="small"><a rel="nofollow" id="cancel-comment-reply-link" href="{{url('')}}/#" style="display:none;">取消回复</a></small>

                                            @else
                                                <input id="login-top"   type="submit"  value="请登录">
                                                <input type="hidden" name="" value="" id="comment_post_ID">
                                                <input type="hidden" name="comment_parent" id="comment_parent" value="0"> <small id="small"><a rel="nofollow" id="cancel-comment-reply-link" href="{{url('')}}/#" style="display:none;">取消回复</a></small>
                                                <script>
                                                    $(function(){
                                                        $("#login-top").click(function(){
                                                            $("#sign").addClass("sign");
                                                            $('body').toggleClass("fadeIn");
                                                            $("#sign-go").addClass("#sign loginPart loginpart part sign");
                                                        });
                                                        $("#close-pp").click(function() {
                                                            $('body').toggleClass("fadeIn");
                                                        });
                                                    });
                                                </script>
                                        @endif
                                        <div id="OwO">

                                        </div>
                                        <div id="moe-wrapper"><a class="moebutton ds-toolbar-button" id="moebutton"></a>
                                            <div class="hentai_box"></div>
                                            <br> </div>
                                        </p> <span class="mail-notify-check"><input type="checkbox" name="comment_mail_notify" id="comment_mail_notify" value="comment_mail_notify" checked="checked" style="vertical-align:middle;"><label for="comment_mail_notify" style="vertical-align:middle;">有人回复时邮件通知我</label></span> </form>
                                </div>
                            </div>
                            <div id="fymother">
                                <div class="1">
                                    <div class="3"></div>
                                </div>
                                <div class="2">
                                    <div class="3"></div>
                                </div>
                                <div class="3">
                                    <div class="1"></div>
                                    <div class="2">
                                        <script type="text/javascript" src="{{url('5dm/js/owo.js')}}"></script>
                                        <script src="{{url('5dm/js/OwO.min.js')}}"></script>
                                        <script>
                                            var oDivs = document.getElementsByClassName('form-submit form_heig')[0];
                                            var oDiv2 = document.getElementById('small');
                                            var oDiv3 = document.createElement('div');
                                            oDiv3.id = 'OwO';
                                            oDiv3.innerHTML = '<div class="OwO"></div>';
                                            oDivs.insertBefore(oDiv3, oDiv2);
                                            oDivs.insertBefore(oDiv3, oDiv2.nextSibling);
                                            var OwO_demo = new OwO({ logo: '(・ω・)', container: document.getElementsByClassName('OwO')[0], target: document.getElementById('comment'), api: '/5dm/js/OwO.min.json', position: 'down', width: '100%', maxHeight: '250px' });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div id="comments_content">
                                <div id="loading-comments"><span>评论载入中，请稍等...</span></div>
                                <nav class="navigations-up">
                                    <div id="comments-navi" class="pagination"></div>
                                </nav>
                                <ol class="commentlist">
                                    <li class="comment byuser comment-author-hzj bypostauthor even thread-even depth-1" id="li-comment-25119">
                                        <article id="comment-25119" class="comment">
                                            <div class="avatar-wrap"> <img src="/5dm/img/default_avatar.jpg" class="avatar" width="66" height="66"> </div>
                                            <div class="comment-meta comment-author">
                                                <cite class="fn">
                                                    <a href="{{url('')}}" rel="external nofollow" class="url">02</a>
                                                    <i class="img-icon annual_member"></i>
                                                </cite>
                                                <span class="floor">233楼</span>
                                                <span class="comment-edit"> <p class="edit-link">
                                                        <a class="comment-edit-link" href="#">编辑</a></p>
                                                </span>
                                                <div class="comment-content">
                                                    <p>广告点一点，H站走更远！<img src="/5dm/img/default_avatar.jpg" alt="击掌" style="vertical-align: middle;"></p>
                                                </div>
                                                <a>
                                                    <time datetime="2018-06-08T15:14:31+08:00">2333年2月33日 02:33 </time>
                                                </a>
                                            </div>
                                        </article>
                                    </li>
                                </ol>
                                <nav class="navigations">
                                    <div id="comments-navi" class="pagination"></div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sidebar" class="col-md-3">
                    <div id="text-2" class=" no-border widget widget-border widget_text">
                        <div class="textwidget">
                            <div class="about-author">
                                <div class="author-avatar"><img src="{{url(\App\User::find($video->userid)->avatar)}}" class="avatar" width="140" height="140"></div>
                                <div class="author-info"><a href="{{url('u')}}/{{\App\User::find($video->userid)->name}}" title="由{{\App\User::find($video->userid)->name}}发布" rel="author">{{\App\User::find($video->userid)->name}}</a><i class="img-icon icon_male"></i>
                                    <p title="{{\App\User::find($video->userid)->description}}" class="desc">{{\App\User::find($video->userid)->description}}</p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="fp-btns xunzhan"> <span data-uid="1" data-act="follow" class="follow-btn unfollowed current"><i class="fa fa-plus"></i>关 注</span> <span class="pm-btn"><a href="{{url('#')}}/message" title="发送私信">私信</a></span> </div>
                        </div>
                    </div>
                    <div id="text-3" class=" no-border widget widget-border widget_text">
                        <div class="textwidget">

                            <a href="#广告" >
                                {{--<img style="border-radius:4px;width:100%;height:100%;" src="">--}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection