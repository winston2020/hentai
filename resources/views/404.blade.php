@extends('layout.video')
@section('title',$tdk->title)
@section('description',$tdk->description)
@section('keywords',$tdk->keywords)
@section('content')
    {{--<div class="blog-heading ">--}}
        {{--<div class="container" style="text-align: center"><h1>404!</h1> <span>你找不到我,找不到我</span></div>--}}
    {{--</div>--}}
    <div id="body">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                {{--<div id="content" class="content-404 col-md-4" role="main"><h1 class="maincolor2">404</h1>--}}
                    {{--<p >Please try a search.</p>--}}
                    <div class="search">
                        <form class="light-form" action="{{url('search')}}">
                            <div class="input-group" >
                                <input type="text" name="data" id="searchdata4" class="form-control" placeholder="兄嘚.多搜几下就能找到你的老婆."
                                       autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default maincolor1 maincolor1hover" id="searchres4" type="button">
                                        <i class="fa fa-search"></i></button>
                                </span>

                                <script>
                                    $("#searchres4").click(function(){
                                        var x = $(" #searchdata4").val()
                                        window.location.href="{{url('search')}}/"+x
                                    });
                                </script>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

@endsection()