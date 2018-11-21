@extends('layout.video')
@section('title',$series->name.'-'.$tdk->title)
@section('keywords',$tdk->keyword)
@section('description',$tdk->description)
@section('content')
    <div id="body">
        <div class="container">
            <div class="row">
                <div id="content" class="col-md-12" role="main">
                    <h2 class="light-title">{{$series->name}}</h2>
                    <section class="video-listing">
                        <div class="video-listing-content ">
                            <div class="post_ajax_tm">
                                @foreach($data as $key => $item)
                                <div class="row">
                                    @foreach($item as $value)
                                    <div class="col-md-3 col-sm-6 col-xs-6 ">
                                        <div id="post-41287" class="video-item post-41287 post type-post status-publish format-video has-post-thumbnail hentry category-bangumi tag-9405 tag-9162 post_format-post-format-video">
                                            <div class="qv_tooltip tooltipstered">
                                                <div class="item-thumbnail">
                                                    <a href="{{url('comic')}}/{{$value['id']}}.html">
                                                        <img data-original="{{url($value['comic_img_url'])}}" src="{{url($value['comic_img_url'])}}" alt="{{$value['name']}}" title="{{$value['name']}}">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="item-head">
                                                <h3><a href="{{url('comic')}}/{{$value['id']}}.html" target="_blank" rel="41287" title="{{$value['name']}}">{{$value['name']}}</a> </h3>
                                                <div class="item-info hidden">
                                                    <span class="item-author"><a href="{{url('u')}}/{{$value['userid']}}/#" title="由{{\App\User::find($value['userid'])['name'] }}发布" rel="author">{{\App\User::find($value['userid'])['name'] }}</a></span>
                                                    <span class="item-date">{{$value['created_at']}}</span>
                                                    <div class="item-meta">
                                                        <span><i class="fa fa-arrow-circle-o-up"></i> 0</span>
                                                        <span><i class="fa fa-comment"></i> 1</span> </div>
                                                </div>
                                            </div>
                                            <div class="item-content hidden">
                                                <p>{{$value['description']}}</p>
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