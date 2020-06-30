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

Route::resource('contact', 'ContactController')->except(['edit', 'create', 'update', 'destroy']);
Route::resource('offer', 'OfferController')->except(['edit', 'create']);

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
        Route::get('/action','ActionController@display');
        Route::post('/action','ActionController@store');
        Route::post('action/{action_id}', 'ActionController@commentStore');
        Route::get('article', 'ArticleController@displayComments');
       // Route::post('article/like', 'ArticleController@like');
    });
});
