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

Route::get('/form','FormController@index')->name('index');
Route::get('/add','FormController@add')->name('add');
Route::post('/add','FormController@post_add');
Route::get('/langguage/{language}','LanguageController@index')->name('language.index');
 