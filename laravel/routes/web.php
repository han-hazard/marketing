<?php

use Illuminate\Support\Facades\Route;

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

// Route::group(['prefix'=>'form','middleware'=>'auth'],function(){
    Route::get('/','FormController@index')->name('index');
    Route::get('/add',['middleware'=>'auth'],'FormController@add')->name('add');
    Route::post('/add','FormController@post_add');
    Route::get('/langguage/{language}','LanguageController@index')->name('language.index');
    Route::get('/login','FormController@login')->name('login');
    Route::post('/login','FormController@post_login')->name('login');
    Route::get('/user','UserController@user')->name('user');
    Route::get('/user-add','UserController@add')->name('user_add');
    Route::post('/user-add','UserController@user_add');
// });

// Auth::routes();

