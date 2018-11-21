@extends('layout.video')
@section('title',$comic->name.'-'.$comic->author.'-'.$tdk->title)
@section('keywords',$comic->name.','.$comic->author.','.$tdk->keyword)
@section('description',$comic->description)
@section('content')
    <div id="body">
        <div class="container">
            <div class="row">
                <div id="content" class="col-md-12" role="main">
                    <section class="video-listing">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <img style="width: 130px" src="{{$comic->comic_img_url}}">
                        </div>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                         <div class="video-listing-head">
                            <h2 class="light-title hidden-xs" >{{$comic->name}}</h2>
                            <div class="video-listing-filter">
                                <div class="btn-group btn-group-sm ">
                                    <a href="#" class="btn btn-default maincolor2hover current">作者</a>
                                    <a  class="btn"> {{$comic->author}} </a>
                                </div>
                                <div class="btn-group btn-group-sm ">
                                    <a href="#" class="btn btn-default maincolor2hover current">连载状态</a>
                                    <a  class="btn"> {{$comic->weekupdate}} </a>
                                </div>
                                <div class="btn-group btn-group-sm ">
                                    <a href="#" class="btn btn-default maincolor2hover current">更新时间</a>
                                    <a  class="btn">{{$comic->updated_at}} 点击{{$comic->click_number}} 人气 {{$comic->buzz}}</a>
                                </div>
                                <div class="btn-group btn-group-sm ">
                                    <a style="text-decoration: none; height: 80px">{{$comic->description}}</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="video-listing-content ">
                            <div class="post_ajax_tm">
                                @foreach($chaper as $key => $item)
                                    <div class="row">
                                        @foreach($item as $value)
                                            <div class="col-md-3 col-sm-6 col-xs-6 ">
                                                <div id="post-41287" class="video-item post-41287 post type-post status-publish format-video has-post-thumbnail hentry category-bangumi tag-9405 tag-9162 post_format-post-format-video">
                                                    <div class="qv_tooltip tooltipstered">
                                                        <div class="item-thumbnail">
                                                            <a href="{{url('read')}}/{{$value['id']}}.html" >
                                                                <img data-original="{{url($value['comic_img_url'])}}" src="{{url($value['comic_img_url'])}}" alt="{{$value['chapter']}}" title="{{$value['chapter']}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="item-head">
                                                        <h3><a href="{{url('read')}}/{{$value['id']}}.html" target="_blank" rel="41287" title="{{$value['chapter']}}">{{$value['chapter']}}</a> </h3>
                                                        <div class="item-info hidden">
                                                            <span class="item-author"></span>
                                                            <span class="item-date">{{$value['created_at']}}</span>
                                                            <div class="item-meta">
                                                                <span><i class="fa fa-arrow-circle-o-up"></i> 0</span>
                                                                <span><i class="fa fa-comment"></i> 1</span>
                                                            </div>
                                                        </div>
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
                    </section>
                </div>
            </div>
        </div>
    </div>

    @endsection