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

Route::get('/home', 'HomeController@index');

//Crea todas las rutas del controlador User
//Route::resource('users','UserController');

//Route::get('/protegida','SitioController@protegida')->middleware('auth');
//Route::get('/sinproteccion','SitioController@sinproteccion');

//Grupo de rutas que requieren autenticación para acceder
Route::group(['middleware' => 'auth'],
             function(){
    Route::resource('users','UserController');
});





