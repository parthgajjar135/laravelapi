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
Route::get('staticdemo1', 'ProductController@staticdemo1');

Route::get('shows', 'ProductController@shows');
Route::post('adddemo', 'ProductController@adddemo');

Route::get('dynamicdemo2/{id}', 'ProductController@dynamicdemo2');


Route::get('shows1', 'MotelController@shows');
Route::post('destroy/{id}', 'ProductController@destroy');


Route::post('update/{id}', 'ProductController@update');

