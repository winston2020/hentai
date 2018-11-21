<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('seturl','HomeController@seturl');
Route::get('pushline','SitemapController@pushline');
Route::get('duty.html','HomeController@duty');//免责声明
Route::get('aboutus.html','HomeController@about');//关于我们

Route::get('mearch',function ($id){
    return redirect('mearch');
});
// 公用接口
Route::get('/update', 'UpdateController@index'); //上传接口
Route::post('gettagdata','HomeController@gettagdata'); //获取tag数据
Route::post('getchapterdata','HomeController@getchapterdata'); //获取tag数据
Route::post('getmoredata','HomeController@getmoredata'); //获取tag数据

//后台登录
Route::post('web/login','AdminController@login');
Route::get('admin/goout','AdminController@goout');
Route::get('admin/','AdminController@admin');
Route::get('admin/home','AdminController@home');

//视屏

Route::get('admin/video','VideoController@adminlist');
Route::get('admin/video/add','VideoController@add');
Route::get('admin/video/update','VideoController@adminupdate');
Route::post('admin/video/doupdate','VideoController@doadminupdate');
Route::post('admin/video/doadd','VideoController@doadd');
Route::get('admin/video/delete','VideoController@doadmindelete');

//视屏列表
Route::get('admin/videochapter/add','VideoChapterController@add');
Route::post('admin/videochapter/doadd','VideoChapterController@doadd');
Route::get('admin/videochapter/{id}','VideoChapterController@index');

//蜘蛛查看
Route::get('spider','LogController@spider');
Route::get('spider/show','LogController@show');

Route::group(['middleware'=>['web']],function(){
     Route::get('/','HomeController@index');
     Route::get('login','UserController@loginview');
     Route::post('login','UserController@login');
     Route::post('regist','UserController@register');
     Route::get('logout','UserController@goout');//退出功能
     Route::get('sitemap.xml','SiteMapController@index');
     Route::get('sitemap{id?}.xml','SiteMapController@index');
    //漫画
     Route::get('search','HomeController@page404');
     Route::get('search/{data}','HomeController@search'); //搜索页面
     Route::get('comictag/{id}','HomeController@series');
     Route::get('comic/{id}.html','HomeController@chapter');
     Route::get('comic/{id}','HomeController@chapter');
     Route::get('read/{id}.html', 'HomeController@read'); //阅读页面
     Route::get('read/{id}', 'HomeController@read'); //阅读页面
     //资讯
     Route::get('page','PageController@index');
     Route::get('page/{id}.html','PageController@show');
     Route::get('page/{id}','PageController@show');
     //视频
     Route::get('bangumi','VideoController@index');  //视频首
     Route::get('bangumi/{id}','VideoController@show'); //视频播放
     Route::get('video/{id}','VideoController@videotag');//视频类型
     Route::get('bangumi/{id}.html','VideoController@show'); //视频播放
     Route::get('video/{id}.html','VideoController@videotag');//视频类型

     //用户
     Route::get('u','UserController@index');  //用户模块
     Route::post('u/liuyan','UserController@liuyan');  //用户模块
     Route::get('u/{id}.html','UserController@index');  //用户模块
     Route::get('timeline','VideoController@timeline'); //周更新动画
     Route::get('page404','HomeController@page404');//404页面
     //评论
     Route::post('comment','CommentController@comment');//404页面
     Route::get('getcomic','HomeController@getcomic');//404页面

});