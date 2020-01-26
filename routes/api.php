<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('listaUser','UserController@listUser');
Route::get('mostraUser/{id}','UserController@showUser');
Route::post('ciarUser', 'UserController@createUser');
Route::put('atualizaUser/{id}','UserController@updateUser');
Route::delete('deletaUser/{id}','UserController@deleteUser');

Route::middleware('auth:api')->get('/coment', function (Request $request) {
    return $request->coment();
});

Route::get('listaComentario','ComentarioController@listComentario');
Route::get('mostraComentario/{id}','ComentarioController@showComentario');
Route::post('ciarComentario', 'ComentarioController@createComentario');
Route::put('atualizaComentario/{id}','ComentarioController@updateComentario');
Route::delete('deletaComentario/{id}','ComentarioController@deleteComentario');
