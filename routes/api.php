<?php

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('peliculas', 'FilmApiController@index');

});

Route::group(['middleware' => ['auth:api','admin']], function() {

    Route::get('usuarios', 'UserApiController@index');

    Route::get('usuarios/{id}', 'UserApiController@show');

    Route::post('usuarios', 'UserApiController@store');

    Route::put('usuarios/{id}', 'UserApiController@update');

    Route::delete('usuarios/{id}', 'UserApiController@delete');

    Route::get('peliculas/{id}', 'FilmApiController@show');

    Route::post('peliculas', 'FilmApiController@store');

    Route::put('peliculas/{id}', 'FilmApiController@update');

    Route::delete('peliculas/{id}', 'FilmApiController@delete');

});
