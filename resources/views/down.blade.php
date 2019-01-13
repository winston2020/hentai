@extends('layout.video')
@section('title','App下载')
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
                                        <div class="smart-box smart-box-style-1 is-carousel" id="1062285121">
                                            <div class="smart-box-head" style="border:0">
                                                <h2 class="light-title title"></h2>
                                                <div class="smart-control pull-right">
                                                    <a class="prev maincolor2 bordercolor2 bgcolor2hover hidden" href="#" style="display: none;"></a>
                                                    <a class="next maincolor2 bordercolor2 bgcolor2hover hidden" href="#" style="display: none;"></a>
                                                </div>
                                            </div>
                                            <div align="center"><a href="{{$version->address}}"><img style="height: 150px" src="/ad/down.jpg" /></a></div>
                                        </div>
                                        <div class="clear"></div>
                                        <div align="center">
                                            <button align="center" style="border:none ; width: 200px; background-color: #ffb044">
                                                <a href="{{$version->address}}">点击下载App</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    @endsection