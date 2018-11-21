<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="icon" href="{{asset('img/logo.jpg')}}" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/djc_pcbace.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/djc_pclogin.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.lazyload.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.cookie.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-djc-plugin.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/djc_pchead.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/djc_login.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>

    <script>
        function nofind(){
            var img=event.srcElement;
            img.src="{{url('')}}/img/00002.png";
        }
    </script>

</head>
<body class="homeBg">
<div style="display: none;">
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?7947cb8d00af9a26d4ebe68d1ad30216";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</div>

<!-- Umeng统计结束 -->

<!--顶部开始-->
<h2 class="title-h2" id="anchor0" style="position: absolute;top:0;visibility: hidden;margin-top: 0;">精选</h2>
<!--导航开始-->
<nav class="nav-header">
    <div class="nav-container clearfix">
        <h1 class="logo_img">
            <a href="{{url('')}}" style="display: inline-block;height: 22px;">
                <img src="{{url('')}}/img/logo11.png" alt="hentai俱乐部" class="logo_2">
            </a>
        </h1>
        <form id="form_search" >
            <div id="div_search">
                <input type="text" name="str" class="search_Bar" placeholder="请输入漫画名/作者名" id="input">
                <a type="submit" id="searchBtn" ></a>
                <script>
                    $('#searchBtn').click(function () {
                        var str = document.getElementById("input").value;
                        window.location.href='{{url('')}}/search/'+str;
                    });
                </script>
            </div>
        </form>
        <div class="logins">
            <ul class="clearfix login-content">

                <li class="login_lists icon_phone">
                    <i class="icon-phone"></i>
                    <a href="//shang.qq.com/wpa/qunwpa?idkey=d79e80b09383a9bedc41d3843543e325ba716446e5332b07efecbefa042be9f5" target="_blank" class="login_linkTxt download">加群号</a>
                    <img src="{{url('')}}/img/erweima.png" class="topEwm">`
                </li>
                <li class="login_lists icon_phone">
                    <i class="icon-phone"></i>
                    <a href="//shang.qq.com/wpa/qunwpa?idkey=d79e80b09383a9bedc41d3843543e325ba716446e5332b07efecbefa042be9f5" target="_blank" class="login_linkTxt download">关注我们</a>
                    <img src="{{url('')}}/img/weibo1.png" class="topEwm">
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="nav-top">
    <ul>
        <li><a href="{{url('')}}">漫画</a></li>
        <li><a href="{{url('bangumi')}}">番剧</a></li>
        <li><a href="{{url('page')}}" target="_blank">资讯文章</a></li>
        <li class="zizang"><img src="{{url('img/zhizang.png')}}" alt="图标"></li>
    </ul>
</div>

<!--导航结束-->
@yield('css')  <!--放入单独的css-->


@yield('body')
<!--底部内容开始-->

@yield('footer')

</body>

</html>