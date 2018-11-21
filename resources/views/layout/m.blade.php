<!DOCTYPE html>
<html style="font-size: 50px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="blank-translucent">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no">
    <meta name="author" content="kidstone">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <title>@yield('title')</title>
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta http-equiv="Cache-Control" content="max-age=900">
    <script src="{{asset('mobile/js/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('mobile/js/jquery.md5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('mobile/js/swiper-3.4.2.jquery.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('mobile/css/swiper-3.4.2.min.css')}}">
    @yield('css')
    <style>
        a:visited {
            font-size: 12px;
            color: black;
            text-decoration: none
        }
    </style>
</head>
<body>

@yield('content')

<div  class="bo-bo">
    <div class="manhua">
        <a href="{{url('/')}}">
        <div class="small-kuang">
            <img src="{{url('img/manhua.png')}}" alt=""/>漫画
        </div>
        </a>
    </div>
    <div class="manhua">
        <a href="{{'/mvideo'}}">
        <div class="small-kuang">
            <img src="{{url('img/dianying.png')}}" alt=""/>电影
        </div>
        </a>
    </div>
</div>

{{--//百度统计--}}
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?7947cb8d00af9a26d4ebe68d1ad30216";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<style type="text/css">
    /*底部浮动栏*/
    .footer-nav{position:fixed;right:0;bottom:0;left:0;z-index:999;height:1.2rem;background:rgba(0,0,0,.75)}
    .footer-close{float:left;width:.76rem;height:100%}
    .footer-link{position:relative;display:block;margin-left:.76rem;height:100%}
    .footer-link img{position:absolute;top:50%;left:0;margin-top:-.43rem;width:.86rem;height:.86rem}
    .footer-link h3,.footer-link p{padding-left:1.08rem;color:#fff}
    .footer-link h3{padding-top:.29rem;font-size:.32rem;line-height:.32rem}
    .footer-link p{padding-top:.12rem;font-size:.22rem;line-height:.22rem}
    .footer-link h4{position:absolute;top:50%;right:.23rem;margin-top:-.3rem;width:1.96rem;height:.6rem;border-radius:.12rem;background:#eac80d;color:#5b4912;text-align:center;font-size:.26rem;line-height:.6rem}
    .bo-bo{
        position: fixed;
        bottom: 0;
        float: left;
        width: 100%;
        height: 1rem;
        line-height: 0rem;
        text-align: center;
        border:2px solid #e3e197;
        background:#EEC591;
    }
    .manhua{
        position: relative;
        float: left;
        width: 49.3%;
        height: 1rem;
        line-height:.4rem;
        font-size: .3rem;

    }
    .manhua:nth-child(1){
        border-right: 2px solid #e3e197;
    }
    .small-kuang>img{
        width: .4rem;
        height: .4rem;
        margin-left: .18rem;
    }
    .small-kuang{
        width: .8rem;
        height: 1rem;
        margin-left: 40%;
        margin-top: .1rem;
    }
</style>
</body>
</html>