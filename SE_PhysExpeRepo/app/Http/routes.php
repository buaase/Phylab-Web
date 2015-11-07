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
#'middleware'    =>  'auth'
// redirect root path to index
Route::get('/',function(){
    return Redirect::to('index');
});

/*** 
    index routes
***/
Route::get('/index',[
    'as'    =>  'index',
    'uses'  =>  'IndexController@index']);

/***
// Authentication routes
***/
Route::get('/login', [
    'as'    =>  'login',
    'uses'  =>  'Auth\AuthController@getLogin',
    'middleware'    =>  'guest']);
Route::post('/login', [
    'uses'  =>  'Auth\AuthController@postLogin',
    'middleware'    =>  'guest']);
Route::get('/logout', [
    'as'    =>  'logout',
    'uses'  =>  'Auth\AuthController@getLogout',
    'middleware'    =>  'auth']);

/***
// Registration routes
***/
Route::get('/register', [
    'as'    =>  'register',
    'uses'  =>  'Auth\AuthController@getRegister',
    'middleware'    =>  'guest']);
Route::post('/register', [
    'uses'    =>  'Auth\AuthController@postRegister',
    'middleware'    =>  'guest']);

/***
// User routes
***/
Route::get('/user',[
    'as'    =>  'user',
    'uses'  =>  'UserController@index',
    'middleware'    =>  'auth']);
// user infomation edit
Route::get('/user/edit',[
    'as'    =>  'userEdit',
    'uses'  =>  'UserController@edit',
    'middleware'    =>  'auth']);
Route::put('/user',[
    'uses'  =>  'UserController@update',
    'middleware'    =>  'auth']);
// user's avatar upload
Route::post('/user/avatar',[
    'as'    =>  'avatar',
    'uses'  =>  'UserController@setAvatar',
    'middleware'    =>  'auth']);
/***
// Star routes
***/
// user's star report
Route::get('/user/star',[
    'as'    =>  'star',
    'uses' =>  'StarController@index',
    'middleware'    =>  'auth']);
Route::post('/user/star',[
    'uses'  =>  'StarController@create',
    'middleware'    =>  'auth']);
Route::delete('/user/star',[
    'uses'  =>  'StarController@delete',
    'middleware'    =>  'auth']);
Route::get('/user/star/{id}',[
    'uses'    =>  'StarController@show',
    'middleware'    =>  'auth']);
Route::get('/user/star/download/{id}',[
    'as' => 'statDownload',
    'uses'  =>  'StarController@download',
    'middleware'    =>  'auth']);
/***
//Report routes
***/
Route::get('/report',[
    'as'    =>  'report',
    'uses'  =>  'ReportController@index',
    'middleware'    =>  'auth']);
Route::get('/report/{id}',[
    'uses'  =>  'ReportController@show',
    'middleware'    =>  'auth']);
Route::get('/report/edit/{id}',[
    'as'    =>  'editReport',
    'uses'  =>  'ReportController@getXmlForm',
    'middleware'    =>  'auth']);
Route::post('/report',[
    'uses'  =>  'ReportController@create',
    'middleware'    =>  'auth']);
Route::get('/report/download/{experimentId}/{link}',[
    'as'    =>  'downloadReport',
    'uses'  =>  'ReportController@downloadReport',
    'middleware'    =>  'auth']);