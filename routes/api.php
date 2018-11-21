<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::Post('admin/video/upload','VideoController@upload');
Route::Post('admin/videochapter/upload','VideoChapterController@upload');


$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {  //User接口
    $api->group(['namespace' => 'App\Api\Controllers'], function ($api) {
        $api->post('comic','ComicController@index'); //漫画列表
        $api->post('comicchapter','ComicChapterController@index'); //漫画列表
        $api->post('comicimg','ComicImgController@index'); //漫画数据
    });
});
