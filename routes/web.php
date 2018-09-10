<?php


Route::get('/', function () {
    return 'suka';
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

Route::get('mollas/{id?}', 'MollaController@index')->where('id', '[0-9]+');
Route::get('articles/{id?}', 'ArticleController@index')->where('id', '[0-9]+');
Route::get('graves/{id?}', 'GraveYardController@index')->where('id', '[0-9]+');
Route::get('service/{id?}', 'ServicesController@index')->where('id', '[0-9]+');



