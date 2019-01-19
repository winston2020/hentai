<!DOCTYPE html>
<html style="font-size: 50px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="blank-translucent">
    <meta name="description" content="{{$tdk->title.','.$comic->description}}">
    <meta name="keyword" content="{{$comic->name.','.$comicchapter->chapter.','.$comic->author.','.$tdk->keyword}}">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta http-equiv="Cache-Control" content="max-age=900">
    <title>{{$tdk->title.'--'.$comic->name.','.$comicchapter->chapter}}</title>
    <link rel="stylesheet" href="{{asset('mobile/css/global.css')}}">
    <script src="{{asset('mobile/js/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('mobile/js/jquery.md5.min.js')}}"></script>

    <!-- cnzz统计 -->
</head>
<body class="read-body">

<link rel="stylesheet" href="{{asset('mobile/css/reader.css')}}">
<style>
    .button_this{
        color:gray;
        padding-top: 0.1rem;
        font-size: 0.5rem;
        margin-left: 0.3rem;
    }
    .left{
        padding-right: 1.5rem;
        border-right: 1px solid gray;
    }
</style>


<div class="body">
    <header class="header">
        <p id="read-position" class="read-position">{{$comicchapter->chapter}}</p>
        <nav class="reader-nav none" id="reader-nav" style="top: -1.2rem;">
            <a class="go-back icon-back-white" href="{{url('mlist')}}/{{$comicchapter->comic_id}}"></a>
            <p class="nav-title text-ignore">{{$comicchapter->chapter}}</p>
            <a class="show-chapter icon-chapter-white" href="javascript:;"></a>
        </nav>
    </header>
    <section class="content" id="content">
        <div id="read-book">
            <div data-cid="97875" data-page="1" data-lock="0">

                <div class="app-down-chapter">
                    <em class="app-down-close"></em>
                    <a class="app-down-link" href="">
                        <img src="{{asset('mobile/img/saber.jpg')}}" onerror="this.style.display = &#39;none&#39;;">
                        <h4>加群369207198</h4>
                        <h3>Hentai俱乐部</h3>
                        <p>Hentai们的天上人间</p>
                    </a>
                </div>
            </div>
            <div data-cid="99954" data-page="32" data-lock="0">

                @foreach($comicimg as $value)
                    <div class="reader-wrap" ><img src="{{$value->comic_img_url}}" alt="{{$comic->name}}" style="display: block;"></div>
                @endforeach

                    @if(empty($befordata))
                        <a href="#"  class="button_this left" id="page_up">没有上一话了</a>
                    @else
                        <a href="{{url('read')}}/{{$befordata->id}}.html"  class="button_this left" id="page_up">上一话</a>
                    @endif

                    @if(empty($lastdata))
                        <a href="#" class="button_this" id="next_page" >没有下一话了</a>
                    @else
                        <a href="{{url('read')}}/{{$lastdata->id}}.html" class="button_this" id="next_page" onclick="next()">下一话</a>
                    @endif

            </div>
        </div>

</section>

<footer class="footer">
    <style type="text/css">
        /*底部浮动栏*/
        .footer-nav{position:absolute;right:0;bottom:0;left:0;z-index:999;height:1.2rem;background:rgba(0,0,0,.75)}
        .footer-close{float:left;width:.76rem;height:100%}
        .footer-link{position:relative;display:block;margin-left:.76rem;height:100%}
        .footer-link img{position:absolute;top:50%;left:0;margin-top:-.43rem;width:.86rem;height:.86rem}
        .footer-link h3,.footer-link p{padding-left:1.08rem;color:#fff}
        .footer-link h3{padding-top:.29rem;font-size:.32rem;line-height:.32rem}
        .footer-link p{padding-top:.12rem;font-size:.22rem;line-height:.22rem}
        .footer-link h4{position:absolute;top:50%;right:.23rem;margin-top:-.3rem;width:1.96rem;height:.6rem;border-radius:.12rem;background:#eac80d;color:#5b4912;text-align:center;font-size:.26rem;line-height:.6rem}
    </style>

    <nav class="footer-nav none" id="footer-nav" style="bottom: -1.2rem;">
        <em class="footer-close icon-cancel icon-cancel-auto-full"></em>
        <a class="footer-link" href="//shang.qq.com/wpa/qunwpa?idkey=d79e80b09383a9bedc41d3843543e325ba716446e5332b07efecbefa042be9f5">
            <img src="{{asset('mobile/img/saber.jpg')}}" onerror="this.style.display = &#39;none&#39;;">
            <h4>加群369207198</h4>
            <h3>Hentai俱乐部</h3>
            <p>Hentai们的天上人间</p>
        </a>
    </nav>

    <script type="text/javascript">
        $('#footer-nav').on('click', '.footer-close', function() {
            $('#footer-nav').remove();
        });
        // 自定义底部拉起App
        function setLinkAppCfg (cfg, onlyLink) {
            // cfg如果是字符串则认为是在外部已经拼接,直接设置
            if (typeof cfg === 'string') {
                if (onlyLink) {
                    return cfg;
                }
                return $('#footer-nav').find('.footer-link').attr('href', cfg);
            }
            var c = $.extend({
                bookid: 0, // 书id
                book_type: 2, // 1小说 2漫画
                view_type: 2, // 1条漫 2普漫
                title: ' ', // 书名
                author: ' ', // 作者
                thumb: ' ', // 缩略图
                cid: 0, // 0详情页
                islastchapter: 0 // 是否最后一章 1是
            }, cfg);

            function checkValue (val) {
                return val == 1 || val == 2;
            };
            function cheeckEmpty(val) {
                return typeof val === 'string' && val;
            }
            function quote(str) {
                return "'" + str + "'";
            }
            // 因为服务器0是普漫,这里做一下预转换
            c.view_type = c.view_type == 0 ? 2 : c.view_type;
            // 做一些容错处理
            if (c.bookid < 1) {
                return;
            }
            // 跳详情必须带的参数
            if (c.cid < 1) {
                if (![c.book_type, c.view_type].every(checkValue) || ![c.title, c.author, c.thumb].every(cheeckEmpty)) {
                    return;
                }
            }
            if (c.book_type == 1) {
                c.cid = 0;
            }
            // 合并参数
            var p = [c.book_type, c.view_type, c.bookid, quote(c.thumb), quote(c.author), quote(c.title), c.cid, c.islastchapter].join(',');
            if (onlyLink) {
                return 'javascript:applink(' + p + ');';
            }
            $('#footer-nav').find('.footer-link').attr('href', 'javascript:applink(' + p + ');');
        }
    </script>
</footer>
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