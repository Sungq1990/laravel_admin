<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return redirect('pub/home');
});

/**
 * 账号系统登录认证
 */
Route::group([
    'prefix' => 'auth',
], function () {
    //登录
    Route::get('login', ['as' => 'login', 'uses' => 'AuthorityController@getLogin']);
    Route::post('login', ['as' => 'login', 'uses' => 'AuthorityController@postLogin']);
    //退出
    Route::get('logout', ['as' => 'logout', 'uses' => 'AuthorityController@logout']);
});

Route::group([
    'prefix' => 'pub',
    'middleware' => "auth"
], function () {
    //主页
    Route::get('home', ['as' => 'pub.home', 'uses' => 'HomeController@index']);
    //楼盘基本信息
    Route::get('house/index', ['as' => 'pub.house.index', 'uses' => 'HouseController@index']);
    //楼盘编辑
    Route::get('house/edit/{unionId?}', ['as' => 'pub.house.edit', 'uses' => 'HouseController@edit']);
    //楼盘更新
    Route::post('house/update', ['as' => 'pub.house.update', 'uses' => 'HouseController@update']);
    //楼盘中签列表
    Route::get('houseLucky/index', ['as' => 'pub.houseLucky.index', 'uses' => 'HouseLuckyController@index']);
    //楼盘中签软删
    Route::get('houseLucky/del/{unionId?}', ['as' => 'pub.houseLucky.del', 'uses' => 'HouseLuckyController@del']);
    //车牌竞价
    Route::get('car/index', ['as' => 'pub.carBid.index', 'uses' => 'CarController@index']);
    //反馈
    Route::get('feedback/index', ['as' => 'pub.feedback.index', 'uses' => 'FeedbackController@index']);
    //爬虫监控
    Route::get('monitor/spider', ['as' => 'pub.monitor.spider', 'uses' => 'MonitorController@spider']);
});