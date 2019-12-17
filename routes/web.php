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

Route::get('/categoria/{id}', 'CategoryController@index');

Route::get('/pelicula/{id}', 'FilmController@index')->name('pelicula');

Route::get('/cuenta', function () {return view('usuario.cuenta.cuenta');})->middleware('auth');

Route::get("/administrar","AdminController@index")->middleware('auth')->middleware('admin');

Route::get('/trailers', function () {return view('pelicula.trailers.trailers');});

Route::get('/comentar', 'HomeController@index');
Route::post("/comentar","CommentController@create")->name('comentar');

Route::get('/eliminarComentario', 'HomeController@index');
Route::post("/eliminarComentario","CommentController@delete")->name('eliminarComentario');

Route::get('/editarNombre', function () {return view('usuario.cuenta.cuenta');})->middleware('auth');
Route::post("/editarNombre","CuentaController@nombre")->name('name');

Route::get('/editarEmail', function () {return view('usuario.cuenta.cuenta');})->middleware('auth');
Route::post("/editarEmail","CuentaController@email")->name('email');

Route::get('/editarPassword', function () {return view('usuario.cuenta.cuenta');})->middleware('auth');
Route::post("/editarPassword","CuentaController@password")->name('password');

Route::get('/registro', function () {return view('usuario.registro.registro');});
Route::post("/registro","Auth\RegisterController@create")->name('registro');

Route::get('/agregar', function () { return view('pelicula.pelicula.agregarPelicula');})->middleware('auth')->middleware('admin');
Route::post("/agregar","FilmController@create")->name('agregar');

Route::get('/eliminar', 'HomeController@index');
Route::post("/eliminar","FilmController@delete")->name('eliminar');

Route::post("/contacto","MailController@contacto")->name('contacto');
Route::get('/contacto', function () {return view('general.Contacto.contact');});

Route::post("/recordar","MailController@remember")->name('recordar');
Route::get('/recordar', function () {return view('usuario.remember.remember');});

Route::get("/editar/{id}","FilmController@show")->middleware('auth')->middleware('admin');
Route::get('/editar', 'HomeController@index');
Route::post("/editar","FilmController@edit")->name('editar');










