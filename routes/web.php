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

Route::get('/', function () {
    return view('welcome');
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
    Route::any('admin/update','AdminController@update');
    Route::any('admin/del','AdminController@del');
    //分类
    Route::any('cate/index', 'CateController@index');
    Route::get('cate/create', 'CateController@create');
    Route::any('cate/docreate', 'CateController@store');
    Route::get('cate/edit/id/{id}', 'CateController@edit');
    Route::any('cate/update', 'CateController@update');
    Route::any('cate/del', 'CateController@del');
    //文章
    Route::any('article/index', 'ArticleController@index');
    Route::get('article/create', 'ArticleController@create');
    Route::any('article/docreate', 'ArticleController@docreate');
    Route::get('article/edit/id/{id}', 'ArticleController@edit');
    Route::any('article/update', 'ArticleController@update');



});

