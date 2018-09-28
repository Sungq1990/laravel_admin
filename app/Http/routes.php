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
    //用户test
    Route::get('user/index', ['as' => 'pub.user.index', 'uses' => 'UserController@index']);
});