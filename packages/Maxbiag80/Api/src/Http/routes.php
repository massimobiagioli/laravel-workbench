<?php

// Crud
Route::group(['middleware' => config('api.middlewares', []), 'prefix' => '/api/crud'], function() {

    // Load
    Route::get('{modelKey}/{modelId}', 'Maxbiag80\Api\Http\Controllers\CRUDController@load');

    // Count
    Route::get('{modelKey}/count/{queryData}', 'Maxbiag80\Api\Http\Controllers\CRUDController@countQuery');

    // Query
    Route::get('{modelKey}/query/{queryData}', 'Maxbiag80\Api\Http\Controllers\CRUDController@query');

    // Insert
    Route::post('{modelKey}', 'Maxbiag80\Api\Http\Controllers\CRUDController@insert');

    // Update
    Route::put('{modelKey}/{modelId}', 'Maxbiag80\Api\Http\Controllers\CRUDController@update');

    // Delete
    Route::delete('{modelKey}/{modelId}', 'Maxbiag80\Api\Http\Controllers\CRUDController@delete');
});

