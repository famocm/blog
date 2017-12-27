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
Route::group(['middleware'=>['web','is_login']],function(){
    Route::get('admin/index','Admin\IndexController@index');
    Route::get('admin/welcome','Admin\IndexController@welcome');
    Route::get('admin/loginout','Admin\IndexController@loginout');
    Route::any('admin/pass','Admin\IndexController@pass');
});

