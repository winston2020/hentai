@extends('layout.video')
@section('title','hentai文章区-'.$data->title.'-'.$tdk->title)
@section('keywords',$data->title.','.$data->keywords)
@section('description',$data->description)
@section('content')
    <div id="body">
        <div id="content" class="site-content container clear">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article id="post-2658" class="post-2658 post type-post status-publish format-standard has-post-thumbnail hentry category-media-2 category-post-formats tag-video">
                        <header class="entry-header">
                            <h1 class="entry-title">{{$data->title}}</h1>
                            <div class="entry-meta clear">
                                <span class="entry-author">

                                    发表于
                                    <a href="#" title="{{$data->author}}" rel="author">{{$data->author}}</a>
                                </span>
                                <span class="entry-date">{{$data->created_at}}</span>
                            </div><!-- .entry-meta -->
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <div class="entry-thumbnail">
                                {!! $data->content !!}
                            </div><!-- .entry-content -->
                        </div>
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>
    @endsection