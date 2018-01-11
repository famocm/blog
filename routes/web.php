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

Route::group(['middleware'=>['web','is_status']],function(){
    Route::get('/','Home\IndexController@index');
});
Route::group(['middleware'=>['web']],function(){
    Route::any('admin/login','Admin\LoginController@login');
    Route::get('admin/code','Admin\LoginController@code');

});
//Route::get('admin/mima','Admin\LoginController@mima');
//后台
Route::group(['middleware'=>['web','is_login'],'prefix'=>'admin','namespace'=>'Admin'],function(){
    //主页
    Route::get('index','IndexController@index');
    Route::get('welcome','IndexController@welcome');
    Route::get('loginout','IndexController@loginout');
    Route::any('pass','IndexController@pass');
    //管理员
    Route::get('admin/index','AdminController@index');
    Route::any('admin/create','AdminController@create');
    Route::get('admin/edit/id/{id}','AdminController@edit');
    Route::post('admin/update','AdminController@update');
    Route::post('admin/del','AdminController@del');
    //分类
    Route::any('cate/index', 'CateController@index');
    Route::get('cate/create', 'CateController@create');
    Route::post('cate/docreate', 'CateController@store');
    Route::get('cate/edit/id/{id}', 'CateController@edit');
    Route::post('cate/update', 'CateController@update');
    Route::post('cate/del', 'CateController@del');
    //文章
    Route::any('article/index', 'ArticleController@index');
    Route::get('article/create', 'ArticleController@create');
    Route::post('article/docreate', 'ArticleController@docreate');
    Route::get('article/edit/id/{id}', 'ArticleController@edit');
    Route::post('article/update', 'ArticleController@update');
    Route::post('article/del', 'ArticleController@del');
    //友情链接
    Route::get('link/index','LinkController@index');
    Route::any('link/create','LinkController@create');
    Route::get('link/edit/id/{id}','LinkController@edit');
    Route::post('link/update','LinkController@update');
    Route::post('link/del','LinkController@del');
    //网站配置
    Route::any('system/index','SystemController@index');

    

});

