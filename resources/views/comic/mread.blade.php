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
    <script>
        (function(a) {
            var b = a.documentElement,
                c = function() {
                    var a = b.clientWidth || 0;
                    9999 <= a ? b.style.fontSize = "100px" : 0 < a && (b.style.fontSize = a / 750 * 100 + "px")
                };
            a.addEventListener && (window.addEventListener("orientationchange" in window ? "orientationchange" : "resize", c, !1), a.addEventListener("DOMContentLoaded", c, !1));
            c()
        })(document);

    </script>

    <link rel="stylesheet" href="{{asset('mobile/css/global.css')}}">

    <script src="{{asset('mobile/js/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('mobile/js/jquery.md5.min.js')}}"></script>
    <script src="{{asset('mobile/js/djc.global.min.js')}}"></script>

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
                    <div class="reader-wrap" ><img src="{{$value->comic_img_url}}"  style="display: block;"></div>
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
</div>
<div id="read-status"></div>
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

<!-- 章节弹出层 -->
<div class="low-shade low-hide" id="chapter-menu">
    <div class="chapter-menu">
        <h3 class="chapter-sort">章节列表</h3>
        <ul class="chapter-list">
            @foreach($chapter as $value)
                <li>
                    <a  style="color: #fefefe" href="{{url('')}}/read/{{$value->id}}">

                        <i class="text-ignore">{{$value->number+1}} {{$value->chapter}}</i>

                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>



<script type="text/javascript">
    var Class=function(){var a=$.extend;return{Copy:function(b){return b&&"object"===typeof b?a({},b):b}}};Class.extend=function(a){if("function"===typeof a)return a.__parent__=this,a.extend=Class.extend,a.create=Class.create,a;throw Error("\u6784\u9020\u5668\u5fc5\u987b\u4e3afunction\u4e14\u8fd4\u56deobject!");};Class.create=function(a){function b(a,d){var e=null;if(a.__parent__){var e=a.__parent__,c;c="object"===typeof d&&null!==d&&d.__parent__?d.__parent__:void 0;e=b(e,c)}c={__parent__:e};f(c,a.call(c,d));return f({},e,c)}var f=$.extend;return b(this,a)};
</script><script type="text/javascript">
    var Chapter=Class.extend(function(f){var c=null;return{request:function(a){return $.ajax({url:requestURL({c:"BookDetail",a:"get_chapter_list240"}),type:"GET",data:$.agent({id:a,userid:0,sign:"0"})}).done(function(a){0==a.code&&(c=a.data)})},indexOf:function(a){a=parseInt(a);if(isNaN(a))return!1;for(var b=c.data,e=b.length,d=0;d<e;d++)if(b[d].cid==a)return d;return!1},slice:function(a,b){var e=c.data;if(0===Number(a))return e.slice(0);if(0<a)return e.slice(a-1,a+b-1);if(0>a){var d=-a-b-1;return 0==d+b?e.slice(d).reverse():e.slice(a-b+1,a+1).reverse()}return[]},search:function(a,b){b=b||0;return this.Copy(c.data[this.indexOf(a)+b])},next:function(a){return this.search(a,1)},prev:function(a){return this.search(a,-1)},eq:function(a){return this.Copy(c.data[a])},first:function(){return this.eq(0)},last:function(){return this.eq(c.data.length-1)},getViewType:function(){return c.view_type},getThumbCdn:function(){return c.cdn}}});
</script>


<script type="text/javascript">

    var chapterid = DjcUtils.getUrlParam('cid');
    var bookid = DjcUtils.getUrlParam('bookid');
    if (typeof bookid === 'undefined' || bookid === null) {
        bookid = '4132';
    }

    _czc.push(['_trackEvent', '曝光量', '阅读页', '', 1]);

    // 章节同步加载器(一次只能加载一个章节,多次请求会被驳回)
    var ChapterLoad = Class.extend(function (param) {
        // 指定加载器属于哪个实例化的章节管理器
        var chapter = param.chapter;
        // 章节信息缓存
        var _cid = 0;
        var _wait = false;
        // 章节图片信息
        var _readInfo = {};

        return {
            /*
             强制加载,如果当前有正在请求的列表会被驳回
             */
            getChapter: function (cid, fn) {
                _cid = cid;
                _wait = true;
                return $.ajax({
                    url: requestURL({c:'BookDetail', a: 'get_chapter_h5'}),
                    type: 'GET',
                    single: 'chapter_h5',
                    useSingle: true, /* 保证唯一性 */
                    data: $.agent({userid: 0, cid: cid, sign: '0'})
                })
                    .done(function(data) {
                        _wait = false;
                        if (data.code == 0) {
                            _readInfo = data.data;
                            if (typeof fn === 'function') {
                                fn();
                            }
                        } else if (data.code == 21) {
                            // code 21为加锁样式
                            _readInfo = {cid: cid, lock_type: 1, data: []};
                            if (typeof fn === 'function') {
                                fn();
                            }
                        }
                    })
                    .fail(function () {
                        _wait = false;
                        if (typeof fn === 'function') {
                            fn();
                        }
                    });
            },
            /*
             为了让首屏加载更快,next必须让章节列表加载完成后才能使用(this.request.done(xxx))
             或者使用get加载指定章节,可与章节列表一并加载($.when(this.request, this.get))
             读取到下一章节返回cid,没有下一章节返回null,get正在执行返回false
             */
            nextChapter: function (before, after) { //TODO: 两个fn,之前做什么,之后做什么
                // 会接着get的下个id进行请求
                if (!_wait && _cid) {
                    var index = chapter.next(_cid);
                    if (index) {
                        this.getChapter(index.cid, after);
                        if (typeof before === 'function') {
                            before();
                        }
                        return index.cid;
                    }
                    return null;
                }
                return false;
            },
            /*
             获取Read当前的Cid
             */
            getCid: function () {
                return _cid;
            },
            /*
             阅读图片的信息
             */
            getReadInfo: function () {
                return this.Copy(_readInfo);
            },
            /*
             章节列表的信息
             */
            getListInfo: function () {
                return chapter.search(_cid);
            },
            /*
             普漫或者条漫
             */
            getViewType: function () {
                return chapter.getViewType();
            },
            /*
             是否最后一章
             */
            isLast: function () {
                return chapter.last().cid == _cid;
            }
        }
    });


    // 章节阅读渲染器
    var ChapterRead = ChapterLoad.extend(function (param) {
        var _$id = param.id;
        var _bookid = param.bookid;

        var _bookInfo = null;

        var author = ' ';
        var title = ' ';

        // 获取单章
        function getChapterHTML (cid, data, cdn, view_type, islastchapter) {
            var str = '';
            // 图片容器
            for (var i = 0; i < data.length; i++) {
                str += [
                    '<div class="reader-wrap reader-wait icon-wait" data-img-id="' + data[i].id + '">',
                    '<img src="' + cdn + data[i].image + '" onload="loadImages(' + data[i].id + ');" onerror="failImages(' + data[i].id + ');">',
                    '</div>'
                ].join('');
            }
            // 拉起APP(加载的这章)
            var link = setLinkAppCfg({
                cid: cid,
                bookid: _bookid,
                view_type: view_type,
                author: author,
                title: title,
                islastchapter: islastchapter
            }, true);
            // 结尾跳转
            str += [
                '<div class="app-down-chapter">',
                '<em class="app-down-close"></em>',
                '<a class="app-down-link" href="">',
                '<img src="{{asset('mobile/img/saber.jpg')}}" onerror="this.style.display = \'none\';">',
                '<h4>加群369207198</h4>',
                '<h3>Hentai俱乐部</h3>',
                '<p>Hentai们的天上人间</p>',
                '</a>',
                '</div>'
            ].join('');
            // 章节容器
            str = '<div data-cid="' + cid + '" data-page="' + data.length + '" data-lock="0">' + str + '</div>';
            return str;
        }

        // 虚拟加载图
        function getVirtualHTML (data) {
            // 获取指定个数占位符
            function getPlaceholder (count) {
                var str = '';
                while (count > 0) {
                    str += '<div class="reader-wrap reader-wait icon-wait" data-img-id="0"></div>';
                    count--;
                }
                return str;
            }

            var total = data.lock_type == 1 ? 1 : data.total;

            return [
                '<div data-cid="' + data.cid + '" data-page="' + total + '" data-lock="0">',
                getPlaceholder(total),
                '</div>'
            ].join('');
        }

        // 加锁样式
        function getLockerHTML (cid, view_type) {
            // 拉起APP(加载的这章)
            var link = setLinkAppCfg(_bookInfo, true);
            // 加锁样式
            return [
                '<div data-cid="' + cid + '" data-page="1" data-lock="1">',
                '<div class="reader-wrap reader-locker" data-img-id="0">',
                '<h3>该章节为锁定章节</h3>',
                '<p>下载Hentai俱乐部App后可解锁阅读</p>',
                '</div>',
                '<div class="app-down-chapter">',
                '<em class="app-down-close"></em>',
                '<a class="app-down-link" href="">',
                '<img src="{{asset('mobile/img/saber.jpg')}}" onerror="this.style.display = \'none\';">',
                '<h4>加群369207198</h4>',
                '<h3>Hentai俱乐部</h3>',
                '<p>Hentai们的天上人间</p>',
                '</a>',
                '</div>',
                '</div>'
            ].join('');
        }

        // 返回章节Cid的$DOM信息
        function getRelateC (id) {
            return _$id.find('div[data-cid="' + id + '"]');
        }

        // 添加到view,保证添加的cid唯一
        function addToView (id, str) {
            var $find = getRelateC(id);
            if ($find.length > 0) {
                $find.after(str).remove();
            } else {
                _$id.append(str);
            }
            return id;
        }

        return {
            detail: function () {
                return $.ajax({
                    url: requestURL({c:'BookDetail', a: 'get_book_info'}),
                    type: 'GET',
                    data: $.agent({id: _bookid, userid: 0})
                })
                    .done(function(data) {
                        if (data.code == 0) {
                            _bookInfo = data.data;
                        } else {
                            alert(data.msg);
                        }
                    });
            },
            /*
             将章节设置到界面上
             */
            view: function () {
                var info = this.__parent__.getReadInfo();
                var type = this.__parent__.getViewType();
                var str = '';
                // 显示章节图片或加锁样式
                if (info.lock_type == 1) {
                    str += getLockerHTML(info.cid, type);
                } else {

                    str += getChapterHTML(info.cid, info.data, info.cdn, type, this.__parent__.isLast()>>>0);
                }
                // 返回渲染的章节(cid)
                return addToView(info.cid, str);
            },
            /*
             根据章节列表内容显示虚拟的加载
             */
            virtual: function () {
                var info = this.__parent__.getListInfo();
                var str = getVirtualHTML(info);
                return addToView(info.cid, str);
            },
            /*
             指定书的信息
             */
            assign: function (info) {
                author = info.author;
                title = info.title;
            },
            /*
             显示某张章节图片
             当图片加载时其实是隐藏的(因为显示默认加载图)
             可以调用这个方法让图片显示出来(一般在图片加载完成时)
             */
            load: function (id) {
                _$id
                    .find('div[data-img-id="' + id + '"]')
                    .removeClass('reader-wait icon-wait')
                    .find('img')
                    .css('display', 'block');
            },
            /*
             处理失败的图片,目前就还是显示load图
             */
            fail: function (id) {
                _$id
                    .find('div[data-img-id="' + id + '"]')
                    .removeClass('reader-wait')
                    .addClass('reader-error')
            },
            /*
             返回章节Cid的$DOM信息
             */
            getRelateC: function (id) {
                return getRelateC(id);
            },
            /*
             返回ImgId对应的cid
             */
            getImgFrom: function (id) {
                if (id > 0) {
                    var $img = _$id.find('div[data-img-id="' + id + '"]');
                    if ($img.length > 0) {
                        return $img.parent().attr('data-cid');
                    }
                }
                return false;
            }
        }
    });


    // 书简要信息管理器
    var BookDigest = Class.extend(function (param) {
        var _bookid = param.bookid;
        var _$id = param.id;

        var _bookInfo = null;

        // 完结样式
        // function getOverEnd () {
        // 	return [
        // 		'<div class="read-over">',
        // 			'<p>完结撒花*★,°*:.☆\\(￣▽￣)/$:*.°★*</p>',
        // 			'<a class="reader-link-app border-box" href="javascript:applink(2, 2, 0, \' \', \' \', \' \', 0, 0);">打开大角虫漫画App，看看其他作品吧</a>',
        // 		'</div>'
        // 	].join('');
        // }

        // 未完待续样式
        function getToBeContinue (d) {
            return [
                '<div class="to-be-continue">',
                '<div class="author-info">',
                '<img class="author-head" src="'+ d.head + '" onerror="showDefaultAuthor(this);">',
                '<p class="author-name">' + d.author + '</p>',
                '<p class="author-work">作者大大正在爆肝赶稿中</p>',
                '</div>',
                '<a class="reader-link-app border-box" href="javascript:applink(2, 2, 0, \' \', \' \', \' \', 0, 0);">打开Hentai俱乐部App，看看其他作品吧</a>',
                '</div>'
            ].join('');
        }

        return {
            request: function () {
                return $.ajax({
                    url: requestURL({c:'BookDetail', a: 'get_book_author'}),
                    type: 'GET',
                    single: 'author' + _bookid,
                    data: $.agent({userid: 0, bid: _bookid, sign: '0'})
                })
                    .done(function (data) {
                        if (data.code == 0) {
                            _bookInfo = data.data;
                        }
                    });
            },
            view: function () {
                var str = '';
                if (_bookInfo.status_bz == 1) {
                    str = getToBeContinue(_bookInfo);
                } else {
                    str = getOverEnd();
                }
                _$id.empty().append(str);
            },
            getInfo: function () {
                return this.Copy(_bookInfo);
            }
        }
    });


    // 章节列表渲染器
    var ChapterList = Class.extend(function (param) {
        var chapter = param.chapter;

        var _$id = param.id;
        var _$list = _$id.find('.chapter-list');
        var _$sort = _$id.find('.chapter-sort').find('em');

        // 获取菜单HTML


        // `asc` or `desc`
        function getSort () {
            return _$sort.attr('data-type');
        }

        // 设置某个章节按钮的高亮
        function highlight (cid) {
            _$list.find('li.active').removeClass('active');
            _$list.find('li[data-cid="' + cid + '"]').addClass('active');
        }

        // 刷新菜单
        function refreshMenu () {
            var data = [];
            var sort = getSort();
            if (sort == 'desc') {
                data = chapter.slice(0).reverse();
            } else if (sort == 'asc') {
                data = chapter.slice(0);
            }
            var str = getListHTML(data);
            // 先缓存当前选中状态
            var active = _$list.find('.active');
            _$list.empty().append(str);
            if (active.length > 0) {
                highlight(active.first().attr('data-cid'));
            }
        }

        // 排序按钮事件
        _$sort.on('click', function () {
            if (getSort() == 'asc') {
                _$sort.attr('data-type', 'desc');
            } else {
                _$sort.attr('data-type', 'asc');
            }

            refreshMenu();
        });



        return {
            // 刷新菜单
            refresh: function () {
                refreshMenu();
            },
            getSort: function () {
                return getSort();
            },
            open: function () {
                _$id.removeClass('low-hide');
                _$list.addClass('ui-scroll-view');
            },
            close: function () {
                _$id.addClass('low-hide');
                _$list.removeClass('ui-scroll-view');
            },
            toggle: function () {
                _$id.toggleClass('low-hide');
                _$list.toggleClass('ui-scroll-view');
            },
            isOpen: function () {
                return !_$id.hasClass('low-hide');
            },
            highlight: function (cid) {
                if (cid) {
                    highlight(cid);
                }
            },
            moveToGPS: function () {
                var dom = _$list.find('.active').get(0);
                if (dom) {
                    _$list.scrollTop(dom.offsetTop);
                }
            }
        }
    });


    // 标题渲染器
    var NavTitle = Class.extend(function (param) {
        var _$nav = param.nav;
        var _$fot = param.fot;
        var _$digest = param.digest;
        var _$title = _$nav.find('.nav-title');
        var _dir = 0;

        var MOVE_DIR = {
            UP: 0,
            DOWN: 1
        }

        return {
            setTitle: function (text) {
                _$title.text(text);
                _$digest.text(text);
            },
            open: function () {
                if (_dir === MOVE_DIR.UP) {
                    return;
                }
                _dir = MOVE_DIR.UP;
                _$nav.removeClass('none').stop(true);
                _$fot.removeClass('none').stop(true);
                _$nav.animate({top: '0'}, 500, function () {
                    _$digest.addClass('none');
                });
                _$fot.animate({bottom: '0'}, 500);
            },
            close: function () {
                if (_dir === MOVE_DIR.DOWN) {
                    return;
                }
                _dir = MOVE_DIR.DOWN;
                _$digest.removeClass('none');
                _$nav.stop(true).animate({top: '-1.2rem'}, 500, function() {
                    _$nav.addClass('none');
                });
                _$fot.stop(true).animate({bottom: '-1.2rem'}, 500, function() {
                    _$fot.addClass('none');
                });
            },
            toggle: function () {
                _dir == 1 ? this.open() : this.close();
            },
            isOpen: function () {
                return !_dir;
            }
        }
    });


    // 滚动触发器(单例)
    var Scroll = Class.extend(function (param) {
        var _$id = param.id;

        // 获取DOM元素的坐标
        function getPosition (d) {
            return {offsetTop: d.offsetTop || -1, offsetHeight: d.offsetHeight || -1};
        }

        // 缓存章节坐标,根据cid正序排列
        var ChapterPosition = [];
        // 查询 ChapterPosition
        var Position = {
            /*
             根据cid写坐标
             */
            write: function (cid, pos) {
                pos.cid = Number(cid);
                var search = false;
                // 查询是否在数组中,不在则直接添加,不必循环
                if (ChapterPosition.length == 0) {
                    ChapterPosition.push(pos);
                    return;
                }
                if (ChapterPosition[ChapterPosition.length - 1].cid < cid) {
                    ChapterPosition.push(pos);
                    return;
                }
                if (ChapterPosition[0].cid > cid) {
                    ChapterPosition.unshift(pos);
                    return;
                }
                // 根据用户阅读方向,从尾部开始遍历性能更好
                for (var i = ChapterPosition.length - 1; i >= 0; i -= 2) {
                    if (i < 0) {
                        break;
                    }
                    // 下一个id
                    var next = ChapterPosition[i - 1] || {cid: -1};
                    // 当前id
                    var that = ChapterPosition[i];
                    // 命中
                    if (that.cid <= cid || next.cid >= cid) {
                        if (that.cid == cid) {
                            ChapterPosition[i] = pos;
                            break;
                        }
                        if (next.cid == cid) {
                            ChapterPosition[i - 1] = pos;
                            break;
                        }
                        if (i > 0) {
                            ChapterPosition.splice(i - 1, 0, pos);
                            break;
                        }
                        ChapterPosition.unshift(pos);
                        break;
                    }
                }
            },
            /*
             根据给的y返回对应区间的{cid: , index: , total: }
             */
            read: function (y) {
                var cid = null;
                // 滑动屏幕超过50%算下一章
                var y = y + (_$id.get(0).clientHeight / 2);
                // 根据用户阅读方向,从尾部开始遍历性能更好
                for (var i = ChapterPosition.length - 1; i >= 0; i--) {
                    var top = ChapterPosition[i].offsetTop;
                    var height = ChapterPosition[i].offsetHeight;
                    if (y >= top && y <= top + height) {
                        cid = ChapterPosition[i].cid;
                    }
                }

                if (!cid) {
                    return false;
                }
                // DOM查询
                var dom = Read.getRelateC(cid);
                var wrap = dom.find('.reader-wrap');
                // 组装结构
                var info = {
                    cid: cid,
                    index: wrap.length,
                    total: wrap.length,
                    lock: dom.attr('data-lock')
                };
                // 遍历图片坐标
                wrap.each(function (i) {
                    var top = this.offsetTop;
                    var height = this.offsetHeight;
                    if (y >= top && y <= top + height) {
                        info.index = i + 1;
                        return false;
                    }
                });
                return info;
            }
        };

        // 回调队列
        var _queue = [];
        // 滚动事件
        _$id.scroll(function (e) {
            // 执行队列(返回false意味着移除队列)
            for (var i = 0; i < _queue.length; i++) {
                var fn = _queue[i];
                if (fn.call(this, e) === false) {
                    _queue.splice(i, 1);
                    i--;
                }
            }
        });

        // 仅图片加载完成触发
        _$id.on('resize', function (e, cid) {
            var dom = Read.getRelateC(cid);
            // 如果所有图片都加载完成
            if (dom.find('.reader-wait').length == 0) {
                // 还是不能滚动
                if (!Scroll.canRolls()) {
                    // 继续向下加载一章
                    var status = Read.nextChapter(
                        function () {
                            Read.virtual();
                            Scroll.resizeOf(Read.getCid());
                        },
                        function () {
                            Read.view();
                            Scroll.resizeOf(Read.getCid());
                        }
                    );
                    // 已经是最后一章
                    if (status === null) {
                        digest.view();
                    }
                }
            }
        });

        return {
            /*
             根据y坐标获取对应的章节
             */
            getPosOf: function (y) {
                return Position.read(y);
            },
            /*
             来重新计算章节ID坐标(用于图片加载完成传入此图片所属章节)
             */
            resizeOf: function (cid) {
                if (Number(cid) > 0) {
                    var dom = Read.getRelateC(cid);
                    var pos = getPosition(dom.get(0));
                    // 将坐标重新写入缓存
                    Position.write(cid, pos);
                    // 触发自定义事件(高度改变)
                    _$id.trigger('resize', cid);
                }
            },
            /*
             滚动事件回调注册
             */
            register: function (fn) {
                _queue.push(fn);
            },
            /*
             查询是否能滚动(内容是否大于一屏)
             */
            canRolls: function () {
                var id = _$id.get(0);
                return id.scrollHeight > id.clientHeight;
            },
            getElement: function () {
                return _$id.get(0);
            }
        }
    }).create({
        id: $('#content')
    });


    // 章节图片加载完成会调用此方法
    function loadImages (id) {
        // 将图片显示出来
        Read.load(id);
        // 通知滚动器有容器大小改变
        Scroll.resizeOf(Read.getImgFrom(id));
    }
    // 章节图片加载失败会调用此方法
    function failImages (id) {
        // 处理失败图片
        Read.fail(id);
        // 通知滚动器有容器大小改变
        Scroll.resizeOf(Read.getImgFrom(id));
    }

    // 显示默认作者图
    function showDefaultAuthor(img) {
        var src = $(img).attr('src') || '';
        if (src.indexOf('/images/default_author.png') > -1) {
            $(img).css('display', 'none');
        } else {
            $(img).attr('src', '/dacu_app/app/Public/images/default_author.png');
        }
    }


    // 实例化章节管理器
    var chapterData = Chapter.create();

    // 实例化章节列表
    var List = ChapterList.create({
        id: $('#chapter-menu'),
        chapter: chapterData
    });

    // 实例化阅读器
    var Read = ChapterRead.create({
        id: $('#read-book'),
        bookid: bookid,
        __parent__: {
            chapter: chapterData
        }
    });

    // 实例化导航栏
    var readNav = NavTitle.create({
        nav: $('#reader-nav'),
        fot: $('#footer-nav'),
        digest: $('#read-position')
    });

    // 实例化书简要信息
    var digest = BookDigest.create({
        id: $('#read-status'),
        bookid: bookid
    });


    // 滚动事件:导航栏标题与网站标题
    function getPosAndSetTitle (e) {
        var chapterName = '';
        var temp_cid = -1;
        // 如果第一章图小于page的50%会有到顶只能定位到第二张的问题
        // 所以滚动到顶部一定显示第一章
        if (e.currentTarget.scrollTop <= 0) {
            var data = chapterData.search(chapterid);
            if (data) {
                readNav.setTitle(data.name + ' 1/' + (data.lock_type == 1 ? 1 : data.total));
                chapterName = data.name + '_';
                temp_cid = chapterid;
            }
        } else {
            var info = Scroll.getPosOf(e.currentTarget.scrollTop || 0);
            if (info) {
                var data = chapterData.search(info.cid);
                if (data) {
                    readNav.setTitle(data.name + ' ' + info.index + '/' + info.total);
                    chapterName = data.name + '_';
                    temp_cid = info.cid;
                }
            }
        }
        // 如果读取到cid
        if (temp_cid > 0) {
            // 高亮章节列表选中
            List.highlight(temp_cid);
            // 设置linkedme
            var link = Read.getRelateC(temp_cid).find('.app-down-link');
            if (link.length > 0) {
                setLinkAppCfg(link.attr('href'));
            }
            // 刷新时仍然能定位到当前章节
            var param = DjcUtils.getUrlParam();
            if (param.cid != temp_cid) {
                param.cid = temp_cid;
                DjcUtils.replaceHistory('read', param);
            }
        }
        // 部分浏览器更新title会闪动,所以没有变化则不更新
        // var title = chapterName + digest.getInfo().title + '_大角虫漫画';
        // if (document.title != title) {
        // 	document.title = title;
        // }
        // 关闭导航菜单
        if (e.currentTarget.scrollTop > 0 && !List.isOpen()) {
            readNav.close();
        }
    }
    Scroll.register(getPosAndSetTitle);


    // 滚动事件:指定位置加载下一章
    function scrollNextChapter (e) {
        // 获取坐标
        var st = e.currentTarget.scrollTop;
        var oh = e.currentTarget.offsetHeight;
        var sh = e.currentTarget.scrollHeight;

        // 页面底部最后距离屏幕底部75%触发
        if (st + oh >= sh - (oh * 0.75)) {
            // 加载下一章
            var status = Read.nextChapter(
                function () {
                    Read.virtual();
                    Scroll.resizeOf(Read.getCid());
                },
                function () {
                    Read.view();
                    Scroll.resizeOf(Read.getCid());
                    // 重新注册滚动事件
                    Scroll.register(scrollNextChapter);
                }
            );
            // 判断是否成功加载
            if (status === false) {
                return null;
            }
            // 已经是最后一章
            if (status === null) {
                digest.view();
            }
            // `成功定位下一章节并开始加载` 或 `最后一章` 则从队列移除
            return false;
        }
    }

    Scroll.register(scrollNextChapter);


    /*
     一些杂乱的按钮点击事件
     */

    // 导航栏菜单按钮(开关章节列表)
    $('#reader-nav').on('click', '.show-chapter', function(e) {
        readNav.open();
        List.toggle();
    });
    // 章节列表 空白处关闭
    $('#chapter-menu').on('click', function () {
        List.close();
    });
    // 章节列表 子元素不冒泡
    $('#chapter-menu').on('click', '.chapter-menu', function (e) {
        e.stopPropagation();
    });
    // 导航栏显示隐藏
    $('#read-book').on('click', '.reader-wrap', function () {
        readNav.toggle();
    });
    // Link App关闭
    $('#read-book').on('click', '.app-down-chapter .app-down-close', function(event) {
        $(this).parent().remove();
    });
    // 2s没有操作自动关闭导航栏
    !function () {
        var close = setTimeout(function () {
            readNav.close();
        }, 2000);
        $(document).one('click', function(event) {
            clearTimeout(close);
        });
    }();



    /*
     数据加载开始
     */
    // 合并加载章节列表、首屏章节图
    $.when(
        chapterData.request(bookid),
        Read.getChapter(chapterid),
        digest.request(bookid),
        Read.detail()
    )
        .then(function (data1, data2, data3, data4) {

            // 查找错误接口并弹出信息
            var msg = [];
            [].slice.call(arguments, 0).forEach(function (ele, i) {
                var data = ele[0] || null;
                if (!data || data.code != 0) {
                    // 未购买章节不算错误,跳过
                    if (i == 1 && data.code == 21) {
                        return;
                    }
                    msg.push('Error' + i + ':' + data.msg);
                }
            });
            if (msg.length > 0) {
                return alert(msg.join(';'));
            }
            // 设置必要信息
            Read.assign(digest.getInfo());

            // 渲染章节界面
            Read.view();
            // 缓存章节高度
            Scroll.resizeOf(Read.getCid());
            // 刷新章节列表
            List.refresh();

            // 设置默认导航栏标题与网站标题
            getPosAndSetTitle({
                currentTarget: Scroll.getElement()
            });

            // 定位到章节
            List.moveToGPS();

            // 判断滚动条是否能滚动,不能滚动需要继续加载
            var checkScroll = function () {
                if (Scroll.canRolls()) {
                    return;
                }
                // 加载下一章并继续检查
                var status = Read.nextChapter(
                    function () {
                        Read.virtual();
                        Scroll.resizeOf(Read.getCid());
                    },
                    function () {
                        Read.view();
                        Scroll.resizeOf(Read.getCid());
                        // 重新注册滚动事件
                        Scroll.register(scrollNextChapter);
                        checkScroll();
                    }
                );
                // 已经是最后一章
                if (status === null) {
                    digest.view();
                }
            }
            checkScroll();
        });



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