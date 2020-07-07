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
Route::patch('client/{client_id}/points/{code_id}','CodeController@setPoints');
Route::patch('client/{client_id}/{offer_id}','OfferController@buyOffer');
Route::resource('/auth/client','ClientController')->except(['edit', 'create']);
Route::get('/auth/action','ActionController@display');
Route::post('/actions','ActionController@store');



Route::get('action/latlnglist','ActionController@latlngList');

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


        Route::post('action/{action_id}', 'ActionController@commentStore');
        Route::get('/action/comments', 'ActionController@displayComments');
        Route::get('article/{article_id}', 'ArticleController@like');

        // Route::post('article/like', 'ArticleController@like');
    });
});
