<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
Route::get('/login','FormController@login')->name('login');
Route::post('/login','FormController@post_login');

Route::get('/change/{id}','FormController@change')->name('change');
Route::post('/change/{id}','FormController@post_change');

Route::get('/','FormController@home')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/','FormController@index')->name('index');
    //Route::get('/AddContact','FormController@add_ht')->name('hienthi');

    Route::get('/AddContact','FormController@add')->name('AddContact');
    Route::post('/AddContact','FormController@post_add');
    

    Route::get('/forget','FormController@forget')->name('forget');
    Route::post('/forget','FormController@post_forget');



    Route::get('SendMail',[FormController::class,'sendmail']);
    // Route::get('mail','FormController@sendmail');

    Route::get('/user','UserController@user')->name('user');
    
    Route::get('/user-add','UserController@add')->name('user_add');
    Route::post('/user-add','UserController@user_add');

    Route::get('/edit-user/{id}','UserController@edit')->name('edit_user');
    Route::post('/edit-user/{id}','UserController@post_edit');

    Route::get('/delete-user/{id}','UserController@delete')->name('delete_user');

    Route::get('/list','FormController@list')->name('list');

    
    Route::get('AddContact/lang={lang}',function($lang){
        App::setlocale($lang);
        return view('add');
    });
});
    // Route::get('/','FormController@index')->name('index');
    // //Route::get('/AddContact','FormController@add_ht')->name('hienthi');

    // Route::get('/AddContact','FormController@add')->name('AddContact');
    // Route::post('/AddContact','FormController@post_add');

    // Route::get('/login','FormController@login')->name('login');
    // Route::post('/login','FormController@post_login')->name('login');

    // Route::get('SendMail',[FormController::class,'sendmail']);
    // // Route::get('mail','FormController@sendmail');

    // Route::get('/user','UserController@user')->name('user');
    
    // Route::get('/user-add','UserController@add')->name('user_add');
    // Route::post('/user-add','UserController@user_add');
    
    // // Route::get('/langguage/{language}','LanguageController@index')->name('language.index');
    // Route::get('AddContact/lang={lang}',function($lang){
    //     App::setlocale($lang);
    //     return view('add');
    // });

    Route::get('/user','UserController@user')->name('user.admin');


    // Route::group(['prefix'=>'admin','middleware'=> 'auth'],function(){
    //     Route::get('/useradmin','UserController@user')->name('user.admin');
    // });