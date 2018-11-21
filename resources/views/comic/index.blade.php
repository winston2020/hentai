@extends('layout.video')
@section('title',$tdk->title)
@section('keywords',$tdk->keyword)
@section('description',$tdk->description)
@section('content')
    <!--友情链接-->
    <div id="body">
        <div class="container">
            <div class="row">
                <div id="content" class="col-md-12" role="main">
                    <article class="post-6 page type-page status-publish hentry">
                        <div class="content-single toggled">
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="vc_col-sm-12 wpb_column vc_column_container ">
                                    <div class="wpb_wrapper">
                                        {{--番剧放送入口--}}
                                        <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=acf35ac26a46fa33643dd20c6a01b7817175c795d535e8eb9805ec53b8d7c8ff">
                                            <img title="这些新番都被我萌承包了！(x" src="{{url('5dm/img/guanggao.jpg')}}" width="1140" height="100" style="border:0px;margin-bottom:5px;">
                                        </a>
                                        {{--番剧放送结束--}}

                                        {{--顶部推送开始--}}
                                        <div class="smart-box smart-box-style-1 is-carousel" id="1062285121">
                                            <div class="smart-box-head" style="border:0">
                                                <h2 class="light-title title"></h2>
                                                <div class="smart-control pull-right">
                                                    <a class="prev maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('#')}}" style="display: none;"></a>
                                                    <a class="next maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('#')}}" style="display: none;"></a>
                                                </div>
                                            </div>
                                            <div class="caroufredsel_wrapper">
                                                <div class="smart-box-content">
                                                    <div class="smart-item">
                                                        <div class="row">
                                                            @foreach ($lunbo as $item)
                                                                @if($item->rankings === 2)
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <div class="qv_tooltip tooltipstered">
                                                                            <div class="video-item">
                                                                                <div class="item-thumbnail">
                                                                                    <a href="{{url('comic')}}/{{$item->id}}.html" title="{{$item->name}}">
                                                                                        <img data-original="{{$item->comic_img_url}}" src="{{$item->comic_img_url}}"  alt="{{$item->name}}" title="{{$item->name}}" style="display: block;">
                                                                                    </a>
                                                                                    <div class="item-head">
                                                                                        <h3><a href="{{url('comic')}}/{{$item->id}}.html" >{{$item->name}}</a></h3> </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                                        <div class="qv_tooltip tooltipstered">
                                                                            <div class="video-item">
                                                                                <div class="item-thumbnail">
                                                                                    <a href="{{url('comic')}}/{{$item->id}}.html"  title="{{$item->name}}">
                                                                                        <img data-original="{{$item->comic_img_url}}" src="{{$item->comic_img_url}}" alt="{{$item->name}}" title="{{$item->name}}" style="display: block;"></a>
                                                                                    <div class="item-head">
                                                                                        <h3><a href="{{url('comic')}}/{{$item->id}}.html" >{{$item->name}}</a></h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--顶部推送结束--}}

                                        <div class="clear"></div>
                                        {{--广告位招租--}}
                                        <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=acf35ac26a46fa33643dd20c6a01b7817175c795d535e8eb9805ec53b8d7c8ff">
                                        <img class="img-responsive" title="广告位招租" src="http://www.cluai.cn/5dm/img/header.png" width="1140" height="50" style="border:0px;">
                                        </a>
                                        {{--广告位招租--}}

                                        {{--里番新作--}}
                                        {{--新番连载--}}

                                        <div class="clear"></div>
                                        {{--剧场版/ova--}}

                                        @foreach($seriesdata as $item)
                                        <div class="smart-box smart-box-style-2 is-carousel" style="margin-top: 20px" id="774536889">
                                            <div class="smart-box-head">
                                                <h2 class="light-title title">{{$item['series']}}</h2>
                                                <div class="smart-control pull-right">
                                                    <a class="prev maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('')}}/#" style="display: none;"></a>
                                                    <a class="next maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('')}}/#" style="display: none;"></a>
                                                    <a href="{{url('comictag')}}/{{$item['enname']}}" class="bordercolor2 bgcolor2hover" >查看更多&gt;</a></div>
                                            </div>
                                            <div class="caroufredsel_wrapper" >
                                                <div class="smart-box-content">
                                                    <div class="smart-item it-row">
                                                        <div class="row">
                                                            @foreach($item['data'] as $key1 => $value1)
                                                                @foreach($value1 as $value)
                                                                <div class="col-md-3 col-sm-6 col-xs-6">
                                                                    <div class="video-item">
                                                                        <div class="qv_tooltip tooltipstered">
                                                                            <div class="item-thumbnail">
                                                                                <a href="{{url('comic')}}/{{$value['id']}}.html"  title="{{$value['name']}}">
                                                                                    <img data-original="{{$value['comic_img_url']}}" src="{{$value['comic_img_url']}}" alt="{{$value['name']}}" title="{{$value['name']}}" style="display: block;">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="item-head">
                                                                            <h3><a href="{{url('comic')}}/{{$value['id']}}.html" >{{$value['name']}}</a></h3></div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clear"></div>
                                        @endforeach

                                </div>
                                    </div>
                            </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    @endsection