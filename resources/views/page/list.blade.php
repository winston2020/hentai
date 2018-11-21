@extends('layout.video')
@section('title','hentai文章区-'.$tdk->title)
@section('keywords',$tdk->keywords)
@section('description',$tdk->description)
@section('content')
    <div id="body">
        <div class="container">
            <div class="row">
                <div id="content" class="col-md-12" role="main">
                    <section class="video-listing">
                        <div class="video-listing-head">
                            <h2 class="light-title">动漫资讯</h2>
                            <div class="video-listing-filter">
                                <div class="btn-group btn-group-sm hidden-xs"> <a href="#" class="btn btn-default maincolor2hover current">日期</a>
                                    <a href="#" class="btn btn-default maincolor2hover ">标题</a>
                                    <a href="#" class="btn btn-default maincolor2hover ">收藏</a>
                                    <a href="#" class="btn btn-default maincolor2hover com-ment ">评论</a>
                                </div>
                                <div class="dropdown visible-xs btn-group">
                                    <button type="button" class="btn btn-default btn-block dropdown-toggle visible-xs" data-toggle="dropdown"> 排序方式 <i class="fa fa-angle-down pull-right"></i> </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" class="btn btn-default maincolor2hover current">日期</a></li>
                                        <li><a href="#" class="btn btn-default maincolor2hover ">标题</a></li>
                                        <li><a href="#" class="btn btn-default maincolor2hover ">战斗力</a></li>
                                        <li><a href="#" class="btn btn-default maincolor2hover com-ment ">评论</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="video-listing-content ">
                            <div class="post_ajax_tm">
                                @foreach($data as $key => $item)
                                    <div class="row">
                                        @foreach($item as $value)
                                            <div class="col-md-3 col-sm-6 col-xs-6 ">
                                                <div id="post-41287" class="video-item post-41287 post type-post status-publish format-video has-post-thumbnail hentry category-bangumi tag-9405 tag-9162 post_format-post-format-video">
                                                    <div class="qv_tooltip tooltipstered">
                                                        <div class="item-thumbnail">
                                                            <a href="{{url('page')}}/{{$value['id']}}.html" >
                                                                <img data-original="{{$value['img_url']}}" src="{{$value['img_url']}}" alt="{{$value['title']}}" title="{{$value['title']}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="item-head">
                                                        <h3><a href="{{url('page')}}/{{$value['id']}}.html"  rel="41287" title="{{$value['title']}}">{{$value['title']}}</a> </h3>
                                                        <div class="item-info hidden">
                                                            <span class="item-author"><a href="#" title="由{{$value['author']}}发布" rel="author">{{$value['author']}}</a></span>
                                                            <span class="item-date">{{$value['created_at']}}</span>
                                                            <div class="item-meta"> <span><i class="fa fa-arrow-circle-o-up"></i> 0</span> <span><i class="fa fa-comment"></i> 1</span> </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-content hidden">
                                                        <p>{{str_limit($value['content'],100,'...') }}</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                                <div class="row"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <style>
                            .pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus {
                                z-index: 2;
                                color: #fff;
                                cursor: default;
                                background-color:#ff3f1a;
                                border-color: #ff3f1a;
                            }
                        </style>
                        <div style="text-align: center ;">{{$fenye->links()}}</div>

                    </section>
                </div>
            </div>
        </div>
    </div>
    @endsection