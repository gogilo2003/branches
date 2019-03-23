<?php
Route::group(['middleware'=>'web','prefix'=>'admin','as'=>'admin', 'namespace'=>'Ogilo\Branches\Http\Controllers'],function(){
    Route::group(['prefix'=>'branches','as'=>'-branches'],function(){
        Route::get('',['uses'=>'BranchesController@getDashboard']);
        Route::get('add',['as'=>'-add','uses'=>'BranchesController@getAdd']);
    });
});