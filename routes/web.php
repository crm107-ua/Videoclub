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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/login', 'HomeController@index')->name('login');

Route::get('/categoria/{id}', 'CategoryController@index');

Route::get('/pelicula/{id}', 'FilmController@index')->name('pelicula');

Route::get('/cuenta', 'CuentaController@index')->middleware('auth');

Route::get("/administrar","AdminController@index")->middleware('auth')->middleware('admin');

Route::get('/trailers', 'FilmController@trailers');

Route::get('/comentar', 'HomeController@index');
Route::post("/comentar","CommentController@create")->name('comentar');

Route::get('/eliminarComentario', 'HomeController@index');
Route::post("/eliminarComentario","CommentController@delete")->name('eliminarComentario');

Route::get('/editarNombre', 'UserController@index')->middleware('auth');
Route::post("/editarNombre","CuentaController@nombre")->name('name');

Route::get('/editarEmail', 'UserController@index')->middleware('auth');
Route::post("/editarEmail","CuentaController@email")->name('email');

Route::get('/editarPassword', 'UserController@index')->middleware('auth');
Route::post("/editarPassword","CuentaController@password")->name('password');

Route::get('/registro', 'UserController@create');
Route::post("/registro","Auth\RegisterController@create")->name('registro');

Route::get('/agregar', 'FilmController@addFilmForm')->middleware('auth')->middleware('admin');
Route::post("/agregar","FilmController@create")->name('agregar');

Route::get('/eliminar', 'HomeController@index');
Route::post("/eliminar","FilmController@delete")->name('eliminar');

Route::post("/contacto","MailController@contacto")->name('contacto');
Route::get('/contacto', 'MailController@index');

Route::post("/recordar","MailController@remember")->name('recordar');
Route::get('/recordar', 'MailController@show');

Route::get("/editar/{id}","FilmController@show")->middleware('auth')->middleware('admin');
Route::get('/editar', 'HomeController@index');
Route::post("/editar","FilmController@edit")->name('editar');

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::post('/send','ChatController@send');
Route::post('/saveToSession','ChatController@saveToSession');
Route::post('/deleteSession','ChatController@deleteSession');
Route::post('/getOldMessage','ChatController@getOldMessage');











