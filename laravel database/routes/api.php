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

//Api_Auth
 
Route::get('apidemo1', 'MyApiController@staticdemo');
Route::get('apidemo2', 'MyApiController@dynamicdemo1');
Route::get('apidemo3/{cat_id}', 'MyApiController@dynamicdemo2');

Route::post('apidemo', 'MyApiController@apidemo');
Route::get('apidemo1', 'MyApiController@apidemo1');
Route::get('apiid/{cat_id}', 'MyApiController@apiid');
Route::post('apiupdate/{cat_id}', 'MyApiController@apiupdate');
Route::get('apidel/{cat_id}', 'MyApiController@apidel');