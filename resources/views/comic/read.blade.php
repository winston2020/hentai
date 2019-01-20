<!DOCTYPE html>
<!-- saved from url=(0050)#read/?cid=105871 -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>{{$tdk->title}}-{{$comic->name}}-{{$comic->author}}</title>
    <meta name="description" content="{{$comic->name}}{{$tdk->description}}--{{$tdk->host}}">
    <meta name="keywords" content="{{$comic->name}},{{$comic->author}},{{$tdk->keyword}}">
    <link rel="icon" href="{{asset('img/logo.jpg')}}" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/global.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/djc_pclogin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/djc_pcbace.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/read-layout.css')}}">
    <script type="text/javascript" src="{{url('js/jquery-1.12.4.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery.lazyload.js')}}"></script>
    <script type="text/javascript" src="{{url('js/djc_login.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery.cookie.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- Umeng统计开始 -->
    <!-- 正式服请替换为:1262935467(共三处) -->
</head>
<script type="text/javascript">
    /*防止没有调试功能的老式浏览器报错*/
    var console = console || {
            log : function (data) {
                return false;
            }
        };
    /*提前禁止右键菜单 拖拽 F12*/
    /*老式浏览器*/
    document.oncontextmenu = function(){return false};
    document.ondragstart = function(){return false};
    document.onkeydown = function (e){return !(e.keyCode === 123)};
    /*新式浏览器加强版*/
    document.addEventListener('contextmenu', function(e){e.preventDefault()});
    document.addEventListener('dragstart', function(e){e.preventDefault()});
    document.addEventListener('keydown', function (e){e.keyCode === 123 && e.preventDefault()});
</script>



<div class="read-main" id="reader">
    <div class="read-nav">
        <div class="read-move">
            <div class="read-logo"><a href="{{url('')}}"></a></div>
            <div class="read-bookname">
                <a href="http://www.hentaiclub.cn#" class="read-nav-part" name="index">首页</a>
                <i class="read-nav-next">&gt;</i>
                <a href="javascript:history.back()" class="read-nav-part" name="book">{{$comic->name}}</a>
                <i class="read-nav-next" id="header_caricature_jiantou">&gt;</i>
                <a href="javascript:;" id="header_caricature_name" class="read-nav-details">{{$comicchapter->chapter}}</a>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $("img.lazy").lazyload({
                threshold:300
            })
        })
    </script>
    @foreach($comicimg as $value)
        <div style="text-align: center">
            <img src="{{$value->comic_img_url}}" alt="{{$comic->name}}" style="opacity: 1;" class="lazy" data-original="{{$value->comic_img_url}}">
        </div>
    @endforeach

    <div class="read-footer">
        @if(empty($befordata))
            <a href="#" class="read-footer-page prev-page" id="page_up">没有上一话了</a>
        @else
            <a href="{{url('read')}}/{{$befordata->id}}.html" class="read-footer-page prev-page" id="page_up">上一话</a>
            @endif

        @if(empty($lastdata))
            <a href="#" class="read-footer-page next-page" id="next_page" >没有下一话了</a>
    </div>

    @else
        <a href="{{url('read')}}/{{$lastdata->id}}.html" class="read-footer-page next-page" id="next_page" onclick="next()">下一话</a>
         </div>
            @endif
</div>
<!--注册登录开始-->
<script type="text/javascript" src="{{url('js/cookie.js')}}"></script>
<div class="mode"></div>
<div class="login_container">
    <div class="cancel_ctr">
        <img src="{{url('img/return.png')}}" class="returnLogin">
        <img src="{{url('img/qx.png')}}" alt="" class="cancel">
    </div>
    <!--其他登录方式-->
</div>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?7947cb8d00af9a26d4ebe68d1ad30216";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <script>
        (function(){
            var bp = document.createElement('script');
            var curProtocol = window.location.protocol.split(':')[0];
            if (curProtocol === 'https') {
                bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
            }
            else {
                bp.src = 'http://push.zhanzhang.baidu.com/push.js';
            }
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(bp, s);
        })();
    </script>

</body></html>