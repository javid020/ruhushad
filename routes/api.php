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

//Route::apiResource('books', 'BookController');

Route::group([
    'namespace' => 'API'
], function () {
    Route::get('/', function () {
        return 'suka blyat';
    });

    Route::prefix('test')->group(function () {
        Route::get('categories', 'FakerData@categories');
        Route::get('articles', 'FakerData@articles');
        Route::get('beliefs', 'FakerData@beliefs');
        Route::get('yards', 'FakerData@yards');
        Route::get('mollas', 'FakerData@mollas');
        Route::get('services', 'FakerData@services');
        Route::get('servimages', 'FakerData@servimages');
    });

    Route::get('mollas/{id?}', 'MollaController@index');
    Route::get('articles/{id?}', 'ArticleController@index');
    Route::get('service/{id?}', 'ServicesController@index');
    Route::get('graves/{id?}', 'GraveYardController@index');
});

