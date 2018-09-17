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
Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    Route::middleware('auth:api')->group(function () {
        Route::get('/v1/data', 'v1\DataController@index');
        Route::get('/v1/source', 'v1\SourceController@index');
        Route::get('/v1/structure', 'v1\StructureController@show');
    });
});

