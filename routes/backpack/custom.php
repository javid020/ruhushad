<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('molla', 'MollaCrudController');
    CRUD::resource('article', 'ArticleCrudController');
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('belief', 'BeliefCrudController');
    CRUD::resource('graveyard', 'GraveyardCrudController');
    CRUD::resource('service', 'ServiceCrudController');

    Route::get('dashboard', 'AnalyticsController@index');
}); // this should be the absolute last line of this file