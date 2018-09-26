<?php

Route::pattern('id', '\d+');
Route::pattern('slug', '[A-Za-z]+');
Route::pattern('cart', '[1-9][0-9]{5}');


Route::prefix('test')->group(function () {
    Route::get('categories', 'FakerData@categories');
    Route::get('articles', 'FakerData@articles');
    Route::get('beliefs', 'FakerData@beliefs');
    Route::get('yards', 'FakerData@yards');
    Route::get('mollas', 'FakerData@mollas');
    Route::get('services', 'FakerData@services');
    Route::get('servimages', 'FakerData@servimages');
});


Route::group([
    'namespace' => 'Front'
], function () {
    Route::get('/', function () {
        return view('pages.index');
    })->name('mainpage');

    Route::get('mollas/{id?}', 'MollaController@index');
    Route::get('articles/{id?}', 'ArticleController@index');
    Route::get('service/{id?}', 'ServicesController@index');
    Route::get('graves/{id?}', 'GraveYardController@index');
});

//Create api for mollas. for example api.domain.com/mollas/3 :
//if there is no user, give 400 error
//mollanin butun relationlari "with"-nen

//same for services, yards

//login for mollas. make auth. config > auth create guards. separate admin, mollas etc.
//no username or mail, but phone

//Route::group(['domain' => '{locale}.example.com',  'middleware' => 'checkmobile'], function()
//{
//    Route::prefix('admin')->group(function () {
//        Route::resource('users', 'UsersController');
//    });
//
//    Route::get('card/{cart}', function (){
//        return 'card';
//    });
//
//    Route::get('users/{slug?}', function ($slug = NULL){
//        return $slug;
//    });
//
//});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
