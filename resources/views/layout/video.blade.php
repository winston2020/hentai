<!DOCTYPE html>
<!-- saved from url=(0019)https://www.5dm.tv/ -->
<html lang="zh-CN" class=" js_active  vc_desktop  vc_transform  vc_transform "><!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link rel="shortcut icon" type="ico" href="{{url('5dm/img/logo1510.png')}}">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="https://www.5dm.tv/xmlrpc.php">
    <!--[if lt IE 9]>
    <script src="/wp-content/themes/5moe/js/html5.js" type="text/javascript"></script><![endif]--><!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/5moe/css/ie.css"/><![endif]-->
    <script type="text/javascript">var retina = 'retina=' + window.devicePixelRatio + ';' + retina;
        document.cookie = retina;
        if (document.cookie) { // document.location.reload(true);}</script>
    <meta property="description" content="">
    <script type="text/javascript"> var um = {
            "ajax_url": "https:\/\/www.5dm.tv\/wp-admin\/admin-ajaxxx.php",
            "admin_url": "https:\/\/www.5dm.tv\/wp-admin\/",
            "wp_url": "https:\/\/www.5dm.tv",
            "um_url": "\/wp-content\/plugins\/5moeuser\/",
            "uid": 0,
            "is_admin": 0,
            "redirecturl": "https:\/\/www.5dm.tv\/",
            "loadingmessage": "\u6b63\u5728\u8bf7\u6c42\u4e2d\uff0c\u8bf7\u7a0d\u7b49...",
            "paged": 1,
            "cpage": 1,
            "timthumb": "\/wp-content\/plugins\/5moeuser\/func\/timthumb.php?src="
        }; </script>
    <link rel="dns-prefetch" href="https://fonts.loli.net/">
    <link rel="dns-prefetch" href="https://s.w.org/">
    <link rel="stylesheet" id="wp-block-library-css" href="{{url('5dm')}}/css/style.min.css"
          type="text/css" media="all">
    <link rel="stylesheet" id="um-css" href="{{url('5dm')}}/css/um.css" type="text/css"
          media="all">
    <link rel="stylesheet" id="wp-pagenavi-css" href="{{url('5dm')}}/css/pagenavi-css.css"
          type="text/css" media="all">
    <link rel="stylesheet" id="ajax-comment-css" href="{{url('5dm')}}/css/app.css"
          type="text/css" media="all">
    <link rel="stylesheet" id="colorbox-css" href="{{url('5dm')}}/css/colorbox.css"
          type="text/css" media="all">
    <link rel="stylesheet" id="bootstrap-css" href="{{url('5dm')}}/css/bootstrap.min.css"
          type="text/css" media="all">
    <link rel="stylesheet" id="tooltipster-css" href="{{url('5dm')}}/css/tooltipster.css"
          type="text/css" media="all">
    <link rel="stylesheet" id="style-css" href="{{url('5dm')}}/css/style.css" type="text/css"
          media="all">
    <link rel="stylesheet" id="font-awesome-css" href="{{url('5dm')}}/css/font-awesome.min.css"
          type="text/css" media="screen">
    <link rel="stylesheet" id="5moe-icon-blg-css" href="{{url('5dm')}}/css/justVector.css"
          type="text/css" media="all">
    <link rel="stylesheet" id="mashmenu-css-css" href="{{url('5dm')}}/css/mashmenu.css"
          type="text/css" media="all">
    <link rel="stylesheet" id="js_composer_front-css" href="{{url('5dm')}}/css/js_composer.css"
          type="text/css" media="all">
    <script type="text/javascript" src="{{url('5dm')}}/js/jquery.min.js"></script>
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="/wp-content/plugins/js_composer/assets/css/vc-ie8.css" media="screen">
    <![endif]-->
    <noscript>
        <style> .wpb_animate_when_almost_visible {
                opacity: 1;
            }</style>
    </noscript>

    <script src="{{url('5dm')}}/js/jquery.lazyload.js" type="text/javascript"></script>
    <script type="text/javascript">if (self != top) {
            location.href = "about:blank"
        }
        ;</script>
    <link rel="stylesheet" href="{{url('5dm')}}/css/OwO.min.css">
</head>
<body class="home page-template page-template-page-templates page-template-full-width page-template-page-templatesfull-width-php page page-id-6 full-width custom-background-empty wpb-js-composer js-comp-ver-4.4.3 vc_responsive "
      style="overflow-x: hidden;"><a name="top" style="height:0; position:absolute; top:0;" id="top-anchor"></a>
<div id="body-wrap">
    <script type="text/javascript" src="{{url('5dm')}}/js/ajax-sign-script.min.js"></script>

    <div id="sign" class="sign">
        <div class="part loginPart" id="sign-go">
            <form id="login"  novalidate="novalidate">
                <div id="register-active" class="switch"><i class="fa fa-toggle-on"></i>切换注册</div>
                <h3>登录<p class="status" id="loginerror"></p></h3>
                <p>
                    <label class="icon" for="username"><i class="fa fa-user"></i></label>
                    {{csrf_field()}}
                    <input class="input-control" id="username" type="text" placeholder="请输入用户名" name="name" required="" aria-required="true">
                </p>
                <p>
                    <label class="icon" for="password"><i class="fa fa-lock"></i></label>
                    <input class="input-control" id="password" type="password" placeholder="请输入密码" name="password" required="" aria-required="true">
                </p><a class="close" id="close-pp"><i class="fa fa-times"></i></a>
                <p class="safe">
                    <label class="remembermetext" for="rememberme"><input name="rememberme" type="checkbox" checked="checked" id="rememberme" class="rememberme" value="forever">记住我的登录</label>
                    {{--<a class="lost" href="{{url('')}}">忘记密码 ?</a>--}}
                    <input class="submit" type="button" value="登录" onclick="login()" name="submit">
                </p>
            </form>
            <script>
                function login(){
                    $("#loginerror").html('');
                    $.ajax({
                        url:'/login',
                        type:'post',
                        dataType:'json',
                        data:$("#login").serialize(),
                        success:function (data) {
                            if (data.status ==200){
                                window.location.href = "{{url('')}}";
                            }else{

                                $("#loginerror").append(data.msg)
                            }
                        }
                    })
                }
            </script>
        </div>
        <div class="part registerpart" id="sign-dowm">
            <form id="register"  novalidate="novalidate">

                <div id="login-active" class="switch"><i class="fa fa-toggle-off"></i>切换登录</div>
                <h3>注册<p class="status" id="registerror"></p></h3>
                <p>
                    {{csrf_field()}}
                    <label class="icon" for="user_name"><i class="fa fa-user"></i></label>
                    <input class="input-control" id="user_name" type="text" name="name" placeholder="输入用户名" required="" aria-required="true">
                </p>
                <p>
                    <label class="icon" for="user_email"><i class="fa fa-envelope"></i></label>
                    <input class="input-control" id="user_email" type="text" name="email" placeholder="输入常用邮箱" required="" aria-required="true">
                </p>
                <p>
                    <label class="icon" for="user_pass"><i class="fa fa-lock"></i></label>
                    <input class="input-control" id="user_pass" type="password" name="password" placeholder="密码最小长度为6" required="" aria-required="true">
                </p>
                <p>
                    <label class="icon" for="user_pass2"><i class="fa fa-retweet"></i></label>
                    <input class="input-control" type="password" id="user_pass2" name="user_pass2" placeholder="再次输入密码" required="" aria-required="true">
                </p>
                <input class="submit" type="button" value="注册" onclick="regist()" > <a class="close"><i class="fa fa-times"></i></a>
                <script>
                    function regist() {
                        $("#registerror").html('')
                        $.ajax({
                            url:'/regist',
                            type:'post',
                            dataType:'json',
                            data:$("#register").serialize(),
                            success:function (data) {
                                if (data.status ==200){
                                    window.location.href = "{{url('')}}";
                                }else{
                                    $("#registerror").append(data.msg)
                                }
                            }
                        })
                    }
                </script>
                <input type="hidden" name="_wp_http_referer" value="/">
            </form>
        </div>
    </div>
    
    <div id="wrap" class="">
        <header class="dark-div">
            <div id="top-nav" class="topnav-dark layout-2">
                <div class="nav-blur"></div>
                <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle off-canvas-toggle" id="showordown"
                                    style="user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); touch-action: none;">
                                <span class="sr-only">切换导航</span> <i class="fa fa-reorder fa-bars fa-lg"></i></button>
                            <a class="logo" href="https://www.5dm.tv/">
                                <img src="{{url('5dm/img/logo1510.png')}}" alt="logo">
                            </a>
                        </div>
                        <script>

                            $("showordown").click(function(){
                                $("body").addClass("mnopen");
                            });
                            $('showordown').on('touchend',function(){
                                $("body").addClass("mnopen");
                            })

                        </script>

                        <div id="log" style="float:right;">
                            <ul class="nav navbar-nav navbar-right hidden-xs">
                                <div id="login-reg"><span data-sign="0" id="user-login" class="user-login"> 登录</span>
                                    <span data-sign="1" id="user-reg" class="user-reg">注册</span></div>
                            </ul>
                        </div>
                        <ul class="nav navbar-nav hidden-xs nav-search-box navbar-right">
                            <li class="main-menu-item">
                                <form class=" dark-form" action="{{url('search')}}">
                                    <div class="input-group">
                                        <input type="text" name="s" class="form-control" placeholder="发现更♂大的世界" autocomplete="off">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default maincolor1 maincolor1hover" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav hidden-xs">
                            <li id="nav-menu-item-35843"
                                class="main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-6 current_page_item">
                                <a href="https://www.5dm.tv/" class="menu-link main-menu-link">首页 </a></li>
                            <li id="nav-menu-item-29915"
                                class="main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="https://www.5dm.tv/bgm" class="menu-link main-menu-link">番组 </a></li>
                            <li id="nav-menu-item-38131"
                                class="main-menu-item menu-item-depth-0 menu-item menu-item-type-taxonomy menu-item-object-category">
                                <a href="https://www.5dm.tv/video/news" class="menu-link main-menu-link">动漫资讯 </a></li>
                            <li id="nav-menu-item-38132"
                                class="main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children parent dropdown">
                                <a href="https://www.5dm.tv/timeline"
                                   class="menu-link dropdown-toggle disabled main-menu-link" data-toggle="dropdown">新番时间表 </a>
                                <ul class="dropdown-menu menu-depth-1">
                                    <li id="nav-menu-item-41030"
                                        class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom">
                                        <a href="https://www.5dm.tv/mark/201801"
                                           class="menu-link sub-menu-link">一月新番 </a></li>
                                </ul>
                            </li>
                            <li id="nav-menu-item-29870"
                                class="main-menu-item menu-item-depth-0 menu-item menu-item-type-taxonomy menu-item-object-category">
                                <a href="https://www.5dm.tv/video/end" class="menu-link main-menu-link">完结番组 </a></li>
                            <li id="nav-menu-item-29868"
                                class="main-menu-item menu-item-depth-0 menu-item menu-item-type-taxonomy menu-item-object-category">
                                <a href="https://www.5dm.tv/video/ova" class="menu-link main-menu-link">剧场•OVA </a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    </div>

    <div id="header_bg"
         style="background-image: url({{$tdk->header_img_url}});">
        <div id="animate" class="animate"
             style="font-size: 100px;height: 100px;line-height: 230px;text-shadow: 1px 1px 0 #ff3f1a, -1px -1px 0 #00a7e0;color: #ffffff;text-align: center;">
        </div>
        <a style=" position: absolute; bottom: 0; left: 0; z-index: 1; font-size: 13px; padding: 0 5px; background-color: rgba(0,0,0,0.37); color: #fff;">D站限时开放注册中，快来签订契约成为魔法师吧~</a>
    </div>
    <div id="slider"></div>

    @yield('content')

    <footer class="dark-div">
        <div id="bottom" style="background: #ffffff;padding: 0px 0;margin-bottom: 30px;">
            <div class="container">
                <div class="row"></div>
            </div>
        </div>
        <div id="bottom-nav">
            <div class="container">
                <div class="row">
                    <div class="copyright col-md-6">©2014-2018 五弹幕 - 5dm.tv︱dilili.net</div>
                    <nav class="col-md-6">
                        <ul class="bottom-menu list-inline pull-right">
                            <li id="menu-item-36678"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36678"><a
                                        href="https://www.5dm.tv/aboutus">关于我们</a></li>
                            <li id="menu-item-32"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-32"><a
                                        target="_blank" href="https://www.5dm.tv/aboutus">联系我们</a></li>
                            <li id="menu-item-29356"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-29356"><a
                                        target="_blank" href="https://www.5dm.tv/html/duty.html">资源免责声明</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
    <div class="wrap-overlay"></div>
</div>
<div id="off-canvas">
    <div class="off-canvas-inner">
        <nav class="off-menu">
            <ul>
                <li class="canvas-close"><a href="{{url('/#')}}"><i class="fa fa-times"></i> 关闭</a></li>
                <li class="menu-item current_so"><a target="_blank" href="{{url('search')}}">搜索漫画</a></li>
                <li id="menu-item-35843" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-6 current_page_item menu-item-35843">
                    <a href="{{url('/')}}">首页</a>
                </li>
                @foreach($nav as $item)
                <li id="menu-item-29915" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-29915">
                    <a href="{{url('comictag/'.$item->enname)}}">{{$item->name}}</a>
                </li>
                @endforeach

            </ul>
        </nav>
    </div>
</div>
<script>off_canvas_enable = 1;</script>

<script type="text/javascript">$(function () {
        $("#updown > #lamu img").eq(0).click(function () {
            $("html,body").animate({scrollTop: 0}, 800);
            return false;
        });
        $("#updown > #leimu img").eq(0).click(function () {
            $("html,body").animate({scrollTop: $(document).height()}, 800);
            return false;
        });
    });</script>
<script type="text/javascript" src="{{url('5dm')}}/js/um.js"></script>
<script type="text/javascript" src="{{url('5dm')}}/js/waypoints.min.js"></script>
<script type="text/javascript" src="{{url('5dm')}}/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('5dm')}}/js/jquery.caroufredsel-6.2.1.min.js"></script>
<script type="text/javascript" src="{{url('5dm')}}/js/SmoothScroll.js"></script>
<script type="text/javascript" src="{{url('5dm')}}/js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="{{url('5dm')}}/js/jquery.hammer.js"></script>
<script type="text/javascript" src="{{url('5dm')}}/js/template.js"></script>
<script type="text/javascript" src="{{url('5dm')}}/js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="{{url('5dm')}}/js/jquery.tooltipster.js"></script>
<script type="text/javascript" src="{{url('5dm')}}/js/comment-reply.min.js"></script>

<script type="text/javascript" src="{{url('5dm')}}/js/mashmenu.js"></script>
<script type="text/javascript" src="{{url('5dm')}}/js/wp-embed.min.js"></script>
<script type="text/javascript" src="{{url('5dm')}}/js/js_composer_front.js"></script>


<div id="cboxOverlay" style="display: none;"></div>
<div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;">
    <div id="cboxWrapper">
        <div>
            <div id="cboxTopLeft" style="float: left;"></div>
            <div id="cboxTopCenter" style="float: left;"></div>
            <div id="cboxTopRight" style="float: left;"></div>
        </div>
        <div style="clear: left;">
            <div id="cboxMiddleLeft" style="float: left;"></div>
            <div id="cboxContent" style="float: left;">
                <div id="cboxTitle" style="float: left;"></div>
                <div id="cboxCurrent" style="float: left;"></div>
                <button type="button" id="cboxPrevious"></button>
                <button type="button" id="cboxNext"></button>
                <button id="cboxSlideshow"></button>
                <div id="cboxLoadingOverlay" style="float: left;"></div>
                <div id="cboxLoadingGraphic" style="float: left;"></div>
            </div>
            <div id="cboxMiddleRight" style="float: left;"></div>
        </div>
        <div style="clear: left;">
            <div id="cboxBottomLeft" style="float: left;"></div>
            <div id="cboxBottomCenter" style="float: left;"></div>
            <div id="cboxBottomRight" style="float: left;"></div>
        </div>
    </div>
    <div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div>
</div>
<div class="tooltipster-base tooltipster-fade tooltipster-default tooltipster-fade-show"
     style="pointer-events: auto; transition-duration: 350ms; animation-duration: 350ms; top: 438px; left: 820px;">
    <div class="tooltipster-content"><h4 class="gv-title">哥布林杀手【已完结/共13集】</h4>
        <div class="gv-ex">“我不拯救世界，只管杀哥布林。” 据说这间边境公会里，有个只靠讨伐哥布林升上了银等级（位列第三位）的罕见存在… […]</div>
    </div>
    <div class="tooltipster-arrow-right tooltipster-arrow" style=""><span class="tooltipster-arrow-border"
                                                                          style="margin-left: -1px; border-color: rgb(207, 207, 207);;"></span><span
                style="border-color:rgb(255, 255, 255);"></span></div>
</div>
</body>
<script>

</script>
</html>      