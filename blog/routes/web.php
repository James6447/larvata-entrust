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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'HomeController@role');

//login
Route::get('login/show',['as' => 'login.show', 'uses' =>  'Auth\LoginController@show']);
Route::post('login/logon',['as' => 'login.action', 'uses' =>  'Auth\LoginController@login']);
Route::get('logout/yes',['as' => 'login.logout', 'uses' =>  'Auth\LoginController@logout']);

//register
Route::get('/register/show',function (){
    return view('Auth.adminRegister');
});

Route::post('/new', ['as' => 'register.store', 'uses' => 'Auth\RegisterController@store']);
