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
                <a href="http://hentaiclub.cn#" class="read-nav-part" name="index">首页</a>
                <i class="read-nav-next">&gt;</i>
                <a href="javascript:history.back()" class="read-nav-part" name="book">{{$comic->name}}</a>
                <i class="read-nav-next" id="header_caricature_jiantou">&gt;</i>
                <a href="javascript:;" id="header_caricature_name" class="read-nav-details">{{$comicchapter->chapter}}</a>
            </div>

        </div>
    </div>

    <div class="read-content read-puman">


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
            <img src="{{$value->comic_img_url}}" style="opacity: 1;" class="lazy" data-original="{{$value->comic_img_url}}">
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
    var log_hash = "1wo8a99FhygHcf4xVktrC-svYigFzpWHGmRURaSOG2TG_GFLbVufAwqR47";
    var isdoce = 0;

    function open_weixin(url){
        setcookie('cookurl', document.URL, 3);
        location.href=url;
    }
    var app_path = '#';
</script>


<script type="text/javascript">
    $(function (){

    });
    var storage = localStorage || {
            getItem: function(){
                return false
            },
            setItem: function () {
                return false
            }
        };
    // 读取储存的配置
    var config = {
        showSection: storage.getItem('showSection') == 'true' || storage.getItem('showSection') == null ? true : false,
        showComment: storage.getItem('showComment') == 'true' || storage.getItem('showComment') == null ? true : false
    };

    var $loader;

    $().ready(function() {
        status_start(1);
        // 阅读器初始化参数,参数说明见插件defaluts值
        var param = {
            loadurl: 'http://cdn.517w.com/web_statics/v100/images/index/read/djc-read-default.png',
            urls: ['http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/35a316626fae18fe16b0.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/2b7138b6e0a1dd813a7d.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/1075e651e886da770222.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/5f16d46274cc0e8c8acd.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/21286670f72152537ff8.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/2c3f8e42e27c7571bcc9.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/e253fadb7abe529720e4.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/ace8e268901bcfce6f88.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/84a0b378243c4962d883.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/e8e32d810680fa3f3127.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/3ce45896c7baaa907c20.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/1664315c2a655dd78b9a.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/03d8180b227b116f91fc.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/8186e47bab0c1434cc5a.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/f6b19c73d1b75a5974ed.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/50176801ae9c53e65b91.jpg','http://cdn.517w.com/uploadfile/cartoon/4400/105871/2018-04-12/1e549fe5569a6070d649.jpg'],//初始化加载方案
            showSection: config.showSection,
            showComment: config.showComment,
            type: 0 // 0漫画 1条漫
        };

        // 阅读器初始化
        $loader = $('#reader').djcWebReader(param);

        $('.sidebar-btn').removeClass('none');

        // 章节
        $('.read-section').on('click', '.sidebar-btn', function(event) {
            $loader.djcWebReader('toggleSection');
            // 储存状态
            config.showSection = !config.showSection;
            storage.setItem('showSection', config.showSection);
        });

        // 评论
        // 导航(鼠标移动)
        $('.read-nav').hover(function() {
            $loader.djcWebReader('toggleNav', true);
        }, function() {
            $loader.djcWebReader('toggleNav', false);
        });

        // 导航(滚动条)
        (function() {

            var param = {
                dist: 300, // 滚动多少距离才算触发
                time: 1000 // 多少时间内不在触发
            };
            var last = 0; // 上次滚动值
            var dist = 0; // 滚动距离
            var dir = 0; // 1向上 2向下
            var time = 0; // 记录时间

            $(document).scroll(function(event) {

                var scrollTop = $(document).scrollTop();

                if (last > scrollTop) {
                    dist = dir === 1 ? (dist + last - scrollTop) : 0;
                    dir = 1;
                } else if (last < scrollTop) {
                    dist = dir === 2 ? (dist + scrollTop - last) : 0;
                    dir = 2;
                }

                if (dir === 1 && scrollTop === 0) { // 如果滚动到顶部
                    $loader.djcWebReader('toggleNav', true);
                    dist = 0;
                    time = +new Date;
                } else if (dist >= param.dist && +new Date > param.time + time) { // 鼠标滚动是否满足条件
                    if (dir === 1) {
                        $loader.djcWebReader('toggleNav', true);
                    } else if (dir === 2) {
                        $loader.djcWebReader('toggleNav', false);
                    }
                    dist = 0;
                    time = +new Date;
                }

                last = scrollTop;
            });
        })();

        // 快捷键功能
        $(document).on('keydown', function(event) {
            var keyCode = {
                '37': 'left',
                '38': 'up',
                '39': 'right',
                '40': 'down'
            };
            var param = {
                move: 35,
                speed: 33
            };
            switch (keyCode[event.keyCode]) {
                case 'left':
                    // 上一话实现
                    if ($('#page_up').length){
                        if (is_book_end){
                            window.location.href="/read/?cid=105871";
                        }else {
                            window.location.href="/read/?cid=105764";
                        }
                    }
                    break;
                case 'right':
                    // 下一话实现
                    next();
                    break;
                case 'up':
                    $('body,html').stop(true).animate({scrollTop: $(document).scrollTop() - param.move}, param.speed);
                    break;

                case 'down':
                    $('body,html').stop(true).animate({scrollTop: $(document).scrollTop() + param.move}, param.speed);
                    break;
            }
            // 阻止默认行为
            keyCode[event.keyCode] && event.preventDefault();
        });

        // 评论换页
        $loader.djcWebReader('commentPageEvent', 'click', function (event, index) {
            if(is_book_end){
                pl(index);
                return;
            }
            // 如果点击的页面是当前页面则不请求
            if ($(this).hasClass('active')) {
                return;
            }
            // 回到顶部
            $('.read-comment .sidebar-content').scrollTop(0);
            $.ajax({
                url: '#/index/comment/ajax_get_chapter_comment_data.html',
                type: 'GET',
                data: {
                    chapterId: 105871,
                    page: index
                },
                dataType: 'json',
                single: 'comment' + index
            })
                .done(function (data) {
                    if (data.error == 0) {
                        $loader.djcWebReader('changeComment', data.data);
                        // 重新计算评论的滚动条
                        $(".read-comment .auto-scroll").mCustomScrollbar('update').mCustomScrollbar('scrollTo', 0, {scrollInertia: 0});
                    } else {
                        alert(data.error);
                    }
                })
        });

    });
    var lock_clear_id=0;
    /*
     * 显示上锁_倒计时锁
     */
    function lock_countdown(){
        //显示上锁
        $('#lock').css('display','block');
        var countdown='0';
        lock_clear_id=getRTime(countdown);
        setInterval(function () {
            getRTime(countdown);
        },1000);
    }
    /*
     * 隐藏上锁_倒计时锁
     */
    function lock_countdown_none(){
        //显示上锁
        $('#lock').css('display','none');
        clearInterval(lock_clear_id);
    }

    /*
     * 显示上锁_永久锁
     */
    function lock_permanent(){
        //显示上锁
        $('#lock').find('p').first().remove();
        $('#lock').css('display','block');
    }

    /*
     * 隐藏上锁_永久锁
     */
    function lock_permanent_none(){
        $('#lock').css('display','none');
    }
    function continues() {
        $('#continue').css('display','block');
    }
    function end() {
        $('#end').css('display','block');
    }
    //根据状态id选择启动哪个函数   status 状态： 0 章节不存在 1章节正常 2 章节上锁（永久锁） 3 章节上锁（倒计时锁）  4 章节完结
    function status_start() {
        var status='1';
        switch(parseInt(status)){
            case 0:
                alert('章节不存在');
                break;
            case 1://正常
                break;
            case 2://章节上锁（永久锁）
                lock_permanent();
                break;
            case 3://章节上锁（倒计时锁）
                lock_countdown();
                break;
            case 4://章节完结
                end();
                break;
            default:
                alert('章节不存在');
        }
    }

    function getRTime(countdown){
        var EndTime= new Date(getTimeStr(countdown)); //截止时间
        var NowTime = new Date();
        var t =EndTime.getTime() - NowTime.getTime();
        var d=Math.floor(t/1000/60/60/24);
        var h=Math.floor(t/1000/60/60%24);
        var m=Math.floor(t/1000/60%60);
        var s=Math.floor(t/1000%60);
        if ( d >= 1){
            $('.unlocker-time').text(d+'天'+h+'小时');
            return;
        }
        if ( h >= 1){
            $('.unlocker-time').text(h+'小时'+m+'分钟');
        }else {
            $('.unlocker-time').text(m+'分钟'+s+'秒');
        }
    }
    /*
     * 处理下一页
     */
    var is_book_end=false;
    function next(){
        //判断是否是最后一页
        var next_cid=105946;
        var book_status_bz=1;
        if (next_cid<=0){
            if (book_status_bz==1){
                $('#header_caricature_jiantou').hide();
                $('#header_caricature_name').hide();
                lock_countdown_none();
                lock_permanent_none();
                $loader.djcWebReader('emptyImages');
                continues();
                page_end();
                is_book_end=true;
                pl(1);
                return;
            } else {
                $('#header_caricature_jiantou').hide();
                $('#header_caricature_name').hide();
                lock_countdown_none();
                lock_permanent_none();
                $loader.djcWebReader('emptyImages');
                end();
                page_end();
                is_book_end=true;
                pl(1);
                return;
            }
        }else {
            window.location.href='/read/?cid=105946';
        }
    }
    //处理显示最后一页
    function page_end() {
        $('#next_page').text('看看别的');
        $('#next_page').attr("onclick","javascript:window.location.href = '#'");
        if (!$('#page_up').length){
            $('.read-footer').prepend('<a href="/read/?cid=105764" class="read-footer-page prev-page" id="page_up">上一话</a>');
        }
        $('#page_up').attr('href','javascript:;');
        $('#page_up').attr("onclick","javascript:window.location.href = '/read/?cid=105871'");
        $('.sidebar-content li a.active').attr('class','');
    }
    /*
     * 处理全部评论
     */
    function  pl(index) {
        $.ajax({
            url: '#/index/comment/ajax_get_game_all_data.html',
            type: 'GET',
            data: {
                bookId: 4400,
                page: index
            },
            dataType: 'json',
            single: 'comments' + index
        }).done(function (data) {
            if (data.error == 0) {
                $loader.djcWebReader('changeComment', data.data);
                // 重新计算评论的滚动条
                $(".read-comment .auto-scroll").mCustomScrollbar('update').mCustomScrollbar('scrollTo', 0, {scrollInertia: 0});
            } else {
                alert(data.error);
            }
        })
    }
    $(".auto-scroll").mCustomScrollbar();
    $(".read-section .auto-scroll").mCustomScrollbar('scrollTo', '.active', {scrollInertia: 0});
</script>

<script type="text/javascript">
    $(function() {

        var czc_push_read = function (name) {
        };
        var czc_push_read2 = function (name, name2) {
        }

        var hover_one = function (jq, callback) {
            var is_hover = false;
            jq.hover(function() {
                is_hover = true;
                setTimeout(function () {
                    is_hover && callback();
                    is_hover = false;
                }, 1000);
            }, function() {
                is_hover = false;
            });
        };

        var read_sidebar_section = $('#reader .read-section');
        var read_sidebar_comment = $('#reader .read-comment');
        read_sidebar_section.on('click', '.sidebar-btn', function(event) {
            if (config.showSection) {
                czc_push_read2('章节', '开');
            } else {
                czc_push_read2('章节', '关');
            }
        });
        read_sidebar_comment.on('click', '.sidebar-btn', function(event) {
            if (config.showComment) {
                czc_push_read2('评论', '开');
            } else {
                czc_push_read2('评论', '关');
            }
        });
        read_sidebar_section.on('click', '.sidebar-content li a', function(event) {
            czc_push_read('章节列表');
        });
        read_sidebar_comment.on('click', '.comment-page a', function(event) {
            czc_push_read('评论翻页');
        });

        var read_footer = $('#reader .read-footer');
        read_footer.on('click', '.prev-page', function(event) {
            czc_push_read('上一话');
        });
        read_footer.on('click', '.next-page', function(event) {
            czc_push_read('下一话');
        });
        read_footer.on('click', '.read-share-weibo', function(event) {
            czc_push_read2('分享', '微博');
        });
        read_footer.on('click', '.read-share-qzone', function(event) {
            czc_push_read2('分享', 'QQ空间');
        });
        read_footer.on('click', '.read-share-qq', function(event) {
            czc_push_read2('分享', 'QQ');
        });
        hover_one(read_footer.find('.read-share-wx'), function () {
            czc_push_read2('分享', '微信');
        });

    });
    /*
     获取统一时间格式
     */
    function getTimeStr(tiem) {
        if (!isNaN(tiem)){
            return tiem;
        }
        return tiem.replace(/\-/g, "/");
    }
</script>

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