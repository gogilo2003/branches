<?php
Route::group(['middleware'=>'web', 'namespace'=>'Ogilo\Branches\Http\Controllers'],function(){
    Route::group(['middleware'=>'auth:admin','prefix'=>'admin/branches','as'=>'admin-branches'],function(){
        Route::get('',['uses'=>'BranchesController@getDashboard']);
        Route::get('add',['as'=>'-add','uses'=>'BranchesController@getAdd']);
        Route::post('add',['as'=>'-add','uses'=>'BranchesController@postAdd']);
    });

    Route::group(['prefix'=>'branches', 'as'=>'branches'],function(){
        Route::get('',['as'=>'','uses'=>'BranchesController@getBranches']);
        Route::get('{branch_name}/{?page_name}',['as'=>'-branch','uses'=>'BranchesController@getBranch']);
    });
});