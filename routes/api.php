<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: *' );
header( 'Access-Control-Allow-Methods: *');
header( 'Access-Control-Allow-Headers: *');

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



Route::resource('article', 'ArticleController');
Route::resource('user', 'UserController');
Route::resource('categorias', 'CategoriaController');
Route::get('/user/{user}/articles', 'UserController@getArticles');
Route::get('/categoria/{categoria}/articles', 'CategoriaController@getCategoriaArticles');
//Route::get('/categoria/{categoria}', 'CategoriaController@getCategoriaEspecifica');

Route::get('/categorias/{categoria}', 'CategoriaController@show');
Route::get('user/{user}', 'UserController@show');
Route::get('article/{article}', 'ArticleController@show');

/*Route::group(['middleware' => ['auth:api']], function () {
    Route::get('utilizador', function (Request $request) {
        return $request->user();
    });
});*/


Route::group(['prefix' => 'v1'], function()
{
    Route::resource('user', 'UserController');
    Route::resource('news', 'ApiController');
});
Route::post('news/upload', 'ApiController@upload');