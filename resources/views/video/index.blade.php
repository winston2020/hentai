@extends('layout.video')
@section('title','番剧区-'.$tdk->title)
@section('keywords',$tdk->keyword)
@section('description',$tdk->description)
@section('content')
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
                                        <a href="{{url('timeline')}}" >
                                            <img title="这些新番都被我萌承包了！(x" src="{{url('5dm/img/bangumi.png')}}" width="1140" height="100" style="border:0px;margin-bottom:5px;">
                                        </a>
                                        {{--番剧放送结束--}}

                                        {{--顶部推送开始--}}
                                        <div class="smart-box smart-box-style-1 is-carousel" id="1062285121">
                                            <div class="smart-box-head" style="border:0">
                                                <h2 class="light-title title"></h2>
                                                <div class="smart-control pull-right"> <a class="prev maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('#')}}" style="display: none;"></a> <a class="next maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('#')}}" style="display: none;"></a></div>
                                            </div>
                                            <div class="caroufredsel_wrapper" >
                                                <div class="smart-box-content" >
                                                    <div class="smart-item " >
                                                        <div class="row">
                                                            @foreach($data[0] as $item)
                                                                @if($item->top === 1)
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="qv_tooltip tooltipstered">
                                                                    <div class="video-item">
                                                                        <div class="item-thumbnail">
                                                                            <a href="{{url('bangumi')}}/{{$item->id}}"  title="{{$item->name}}【更新至第{{$item->current_number}}集】">
                                                                                <img data-original="{{$item->video_cover_img_url}}" src="{{$item->video_cover_img_url}}" alt="{{$item->name}}【更新至第{{$item->current_number}}集】" title="{{$item->name}}【更新至第{{$item->current_number}}集】" style="display: block;">
                                                                            </a>
                                                                            <div class="item-head">
                                                                                <h3><a href="{{url('bangumi')}}/{{$item->id}}" >{{$item->name}}【更新至第{{$item->current_number}}集</a></h3> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                @else
                                                            <div class="col-md-3 col-sm-6 col-xs-6">
                                                                <div class="qv_tooltip tooltipstered">
                                                                    <div class="video-item">
                                                                        <div class="item-thumbnail"> <a href="{{url('bangumi')}}/{{$item->id}}"  title="{{$item->name}}【更新至第{{$item->current_number}}集】"><img data-original="{{$item->video_cover_img_url}}" src="{{$item->video_cover_img_url}}"  alt="{{$item->name}}【更新至第{{$item->current_number}}集】" title="{{$item->name}}【更新至第{{$item->current_number}}集】" style="display: block;"></a>
                                                                            <div class="item-head">
                                                                                <h3><a href="{{url('bangumi')}}/{{$item->id}}" >{{$item->name}}【更新至第{{$item->current_number}}集】</a></h3> </div>
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
                                        <img title="广告位招租" src="{{url('5dm/img/movie.png')}}" width="1140" height="100" style="border:0px;">
                                        {{--广告位招租--}}
                                        {{--新番连载--}}
                                        <div class="smart-box smart-box-style-2 is-carousel" id="1805223218">
                                            <div class="smart-box-head">
                                                <h2 class="light-title title">连载新番</h2>
                                                <div class="smart-control pull-right"> <a class="prev maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('')}}/#" style="display: none;"></a>
                                                    <a class="next maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('')}}/#" style="display: none;"></a>
                                                    <a href="{{url('video/new')}}" class="bordercolor2 bgcolor2hover" >查看更多&gt;</a></div>
                                            </div>

                                            <div class="caroufredsel_wrapper" >
                                                <div class="smart-box-content" >
                                                    <div class="smart-item it-row" >
                                                        <div class="row">
                                                            @foreach($data[1] as $key => $item)
                                                            @if($key%2==1)
                                                                <div class="col-md-3 col-sm-6 col-xs-6">
                                                                    <div class="video-item">
                                                                        <div class="qv_tooltip tooltipstered">
                                                                            <div class="item-thumbnail"> <a href="{{url('bangumi')}}/{{$item->id}}"  title="{{$item->name}}【更新至第{{$item->current_number}}集】"><img data-original="{{$item->video_cover_img_url}}" src="{{$item->video_cover_img_url}}"  alt="{{$item->name}}【更新至第{{$item->current_number}}集】" title="{{$item->name}}【更新至第{{$item->current_number}}集】" style="display: block;"></a> </div>
                                                                        </div>
                                                                        <div class="item-head">
                                                                            <h3><a href="{{url('bangumi')}}/{{$item->id}}" >{{$item->name}}【更新至第{{$item->current_number}}集】</a></h3></div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                        <div class="row">
                                                            @foreach($data[1] as $key => $item)
                                                                @if($key%2!=1)
                                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                                        <div class="video-item">
                                                                            <div class="qv_tooltip tooltipstered">
                                                                                <div class="item-thumbnail"> <a href="{{url('bangumi')}}/{{$item->id}}"  title="{{$item->name}}【更新至第{{$item->current_number}}集】"><img data-original="{{$item->video_cover_img_url}}" src="{{$item->video_cover_img_url}}" alt="{{$item->name}}【更新至第{{$item->current_number}}集】" title="{{$item->name}}【更新至第{{$item->current_number}}集】" style="display: block;"></a> </div>
                                                                            </div>
                                                                            <div class="item-head">
                                                                                <h3><a href="{{url('bangumi')}}/{{$item->id}}" >{{$item->name}}【更新至第{{$item->current_number}}集】</a></h3></div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--新番连载--}}

                                        <div class="clear"></div>
                                        {{--剧场版/ova--}}
                                        <div class="smart-box smart-box-style-2 is-carousel" id="774536889">
                                            <div class="smart-box-head">
                                                <h2 class="light-title title">剧场版/ova</h2>
                                                <div class="smart-control pull-right">
                                                    <a class="prev maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('')}}/#" style="display: none;"></a>
                                                    <a class="next maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('')}}/#" style="display: none;"></a>
                                                    <a href="{{url('video/ova')}}" class="bordercolor2 bgcolor2hover" >查看更多&gt;</a></div>
                                            </div>
                                            <div class="caroufredsel_wrapper" >
                                                <div class="smart-box-content" >
                                                    <div class="smart-item it-row" >
                                                        <div class="row">
                                                            @foreach($data[2] as $key => $item)
                                                                @if($key%2==1)
                                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                                        <div class="video-item">
                                                                            <div class="qv_tooltip tooltipstered">
                                                                                <div class="item-thumbnail"> <a href="{{url('bangumi')}}/{{$item->id}}"  title="{{$item->name}}【更新至第{{$item->current_number}}集】"><img data-original="{{$item->video_cover_img_url}}" src="{{$item->video_cover_img_url}}" alt="{{$item->name}}【更新至第{{$item->current_number}}集】" title="{{$item->name}}【更新至第{{$item->current_number}}集】" style="display: block;"></a> </div>
                                                                            </div>
                                                                            <div class="item-head">
                                                                                <h3><a href="{{url('bangumi')}}/{{$item->id}}" >{{$item->name}}【更新至第{{$item->current_number}}集】</a></h3></div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <div class="row">
                                                            @foreach($data[2] as $key => $item)
                                                                @if($key%2!=1)
                                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                                        <div class="video-item">
                                                                            <div class="qv_tooltip tooltipstered">
                                                                                <div class="item-thumbnail"> <a href="{{url('bangumi')}}/{{$item->id}}"  title="{{$item->name}}【更新至第{{$item->current_number}}集】"><img data-original="{{$item->video_cover_img_url}}" src="{{$item->video_cover_img_url}}" width="260" height="146" alt="{{$item->name}}【更新至第{{$item->current_number}}集】" title="{{$item->name}}【更新至第{{$item->current_number}}集】" style="display: block;"></a> </div>
                                                                            </div>
                                                                            <div class="item-head">
                                                                                <h3><a href="{{url('bangumi')}}/{{$item->id}}" >{{$item->name}}【更新至第{{$item->current_number}}集】</a></h3></div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--剧场版/ova--}}
                                        <div class="clear"></div>
                                        {{--只有会员知道的世界--}}
                                        <div class="smart-box smart-box-style-2 is-carousel" id="114859272">
                                            <div class="smart-box-head">
                                                <h2 class="light-title title">只有会员知道的世界</h2>
                                                <div class="smart-control pull-right">
                                                    <a class="prev maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('')}}/#" style="display: none;"></a>
                                                    <a class="next maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('')}}/#" style="display: none;"></a>
                                                    <a href="{{url('video/zyhyzddsj')}}" class="bordercolor2 bgcolor2hover" >查看更多&gt;</a>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="caroufredsel_wrapper">
                                                <div class="smart-box-content">
                                                    <div class="smart-item it-row" >
                                                        <div class="row">
                                                            @foreach($data[3] as $key => $item)
                                                                @if($key%2==1)
                                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                                        <div class="video-item">
                                                                            <div class="qv_tooltip tooltipstered">
                                                                                <div class="item-thumbnail"> <a href="{{url('bangumi')}}/{{$item->id}}"  title="{{$item->name}}【更新至第{{$item->current_number}}集】"><img data-original="{{$item->video_cover_img_url}}" src="{{$item->video_cover_img_url}}"  alt="{{$item->name}}【更新至第{{$item->current_number}}集】" title="{{$item->name}}【更新至第{{$item->current_number}}集】" style="display: block;"></a> </div>
                                                                            </div>
                                                                            <div class="item-head">
                                                                                <h3><a href="{{url('bangumi')}}/{{$item->id}}" >{{$item->name}}【更新至第{{$item->current_number}}集】</a></h3></div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <div class="row">
                                                            @foreach($data[3] as $key => $item)
                                                                @if($key%2!=1)
                                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                                        <div class="video-item">
                                                                            <div class="qv_tooltip tooltipstered">
                                                                                <div class="item-thumbnail"> <a href="{{url('bangumi')}}/{{$item->id}}"  title="{{$item->name}}【更新至第{{$item->current_number}}集】"><img data-original="{{$item->video_cover_img_url}}" src="{{$item->video_cover_img_url}}" alt="{{$item->name}}【更新至第{{$item->current_number}}集】" title="{{$item->name}}【更新至第{{$item->current_number}}集】" style="display: block;"></a> </div>
                                                                            </div>
                                                                            <div class="item-head">
                                                                                <h3><a href="{{url('bangumi')}}/{{$item->id}}" >{{$item->name}}【更新至第{{$item->current_number}}集】</a></h3></div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--只有会员知道的世界--}}
                                        <div class="clear"></div>
                                        {{--燃破天际--}}
                                        <div class="smart-box smart-box-style-2 is-carousel" id="1707579290">
                                            <div class="smart-box-head">
                                                <h2 class="light-title title">燃破天际</h2>
                                                <div class="smart-control pull-right">
                                                    <a class="prev maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('')}}/#" style="display: none;"></a>
                                                    <a class="next maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('')}}/#" style="display: none;"></a>
                                                    <a href="{{url('video/rexue')}}" class="bordercolor2 bgcolor2hover" >查看更多&gt;</a>
                                                </div>
                                            </div>
                                            <div class="caroufredsel_wrapper" >
                                                <div class="smart-box-content" >
                                                    <div class="smart-item it-row" >
                                                        <div class="row">
                                                            @foreach($data[4] as $key => $item)
                                                                @if($key%2==1)
                                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                                        <div class="video-item">
                                                                            <div class="qv_tooltip tooltipstered">
                                                                                <div class="item-thumbnail"> <a href="{{url('bangumi')}}/{{$item->id}}"  title="{{$item->name}}【更新至第{{$item->current_number}}集】"><img data-original="{{$item->video_cover_img_url}}" src="{{$item->video_cover_img_url}}"  alt="{{$item->name}}【更新至第{{$item->current_number}}集】" title="{{$item->name}}【更新至第{{$item->current_number}}集】" style="display: block;"></a> </div>
                                                                            </div>
                                                                            <div class="item-head">
                                                                                <h3><a href="{{url('bangumi')}}/{{$item->id}}" >{{$item->name}}【更新至第{{$item->current_number}}集】</a></h3></div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <div class="row">
                                                            @foreach($data[4] as $key => $item)
                                                                @if($key%2!=1)
                                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                                        <div class="video-item">
                                                                            <div class="qv_tooltip tooltipstered">
                                                                                <div class="item-thumbnail"> <a href="{{url('bangumi')}}/{{$item->id}}"  title="{{$item->name}}【更新至第{{$item->current_number}}集】"><img data-original="{{$item->video_cover_img_url}}" src="{{$item->video_cover_img_url}}"  alt="{{$item->name}}【更新至第{{$item->current_number}}集】" title="{{$item->name}}【更新至第{{$item->current_number}}集】" style="display: block;"></a> </div>
                                                                            </div>
                                                                            <div class="item-head">
                                                                                <h3><a href="{{url('bangumi')}}/{{$item->id}}" >{{$item->name}}【更新至第{{$item->current_number}}集】</a></h3></div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--燃破天际--}}
                                        <div class="clear"></div>
                                        {{--永远看不腻的一张脸--}}
                                        <div class="smart-box smart-box-style-2 is-carousel" id="278241352">
                                            <div class="smart-box-head">
                                                <h2 class="light-title title">永远看不腻的一张脸</h2>
                                                <div class="smart-control pull-right">
                                                    <a class="prev maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('')}}/#" style="display: none;"></a>
                                                    <a class="next maincolor2 bordercolor2 bgcolor2hover hidden" href="{{url('')}}/#" style="display: none;"></a>
                                                    <a href="{{url('video/hougong')}}" class="bordercolor2 bgcolor2hover" >查看更多&gt;</a>
                                                </div>
                                            </div>
                                            <div class="caroufredsel_wrapper" >
                                                <div class="smart-box-content" >
                                                    <div class="smart-item it-row" >
                                                        <div class="row">
                                                            @foreach($data[5] as $key => $item)
                                                                @if($key%2==1)
                                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                                        <div class="video-item">
                                                                            <div class="qv_tooltip tooltipstered">
                                                                                <div class="item-thumbnail"> <a href="{{url('bangumi')}}/{{$item->id}}"  title="{{$item->name}}【更新至第{{$item->current_number}}集】"><img data-original="{{$item->video_cover_img_url}}" src="{{$item->video_cover_img_url}}"  alt="{{$item->name}}【更新至第{{$item->current_number}}集】" title="{{$item->name}}【更新至第{{$item->current_number}}集】" style="display: block;"></a> </div>
                                                                            </div>
                                                                            <div class="item-head">
                                                                                <h3><a href="{{url('bangumi')}}/{{$item->id}}" >{{$item->name}}【更新至第{{$item->current_number}}集】</a></h3></div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <div class="row">
                                                            @foreach($data[5] as $key => $item)
                                                                @if($key%2!=1)
                                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                                        <div class="video-item">
                                                                            <div class="qv_tooltip tooltipstered">
                                                                                <div class="item-thumbnail"> <a href="{{url('bangumi')}}/{{$item->id}}"  title="{{$item->name}}【更新至第{{$item->current_number}}集】"><img data-original="{{$item->video_cover_img_url}}" src="{{$item->video_cover_img_url}}"  alt="{{$item->name}}【更新至第{{$item->current_number}}集】" title="{{$item->name}}【更新至第{{$item->current_number}}集】" style="display: block;"></a> </div>
                                                                            </div>
                                                                            <div class="item-head">
                                                                                <h3><a href="{{url('bangumi')}}/{{$item->id}}" >{{$item->name}}【更新至第{{$item->current_number}}集】</a></h3></div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--永远看不腻的一张脸--}}
                                        <div class="clear"></div>

                                        <div class="smart-box wpb_left-to-right wpb_animate_when_almost_visible smart-box-style-2 is-carousel wpb_start_animation" id="975274710">
                                            <div class="smart-box wpb_left-to-right wpb_animate_when_almost_visible smart-box-style-2 is-carousel wpb_start_animation" id="1855489693">
                                                <div class="smart-box wpb_left-to-right wpb_animate_when_almost_visible smart-box-style-2 is-carousel wpb_start_animation" id="1537621130"> </div>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    @endsection()