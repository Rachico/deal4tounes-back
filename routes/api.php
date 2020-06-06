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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'ClientController@store');
    Route::post('/change-password', 'AuthController@store');
    
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('/logout', 'AuthController@logout');
        Route::get('/user', 'AuthController@user');
        Route::get('/article','ArticleController@display');
        Route::post('/article','ArticleController@store');
        
        Route::get('article/{article_id}', 'ArticleController@like');
       // Route::post('article/like', 'ArticleController@like');
    });
});
