<?php
Route::group(['middleware'=>'web', 'namespace'=>'Ogilo\Branches\Http\Controllers'],function(){
    Route::group(['middleware'=>'auth:admin','prefix'=>'admin/branches','as'=>'admin-branches'],function(){
        Route::get('',['uses'=>'BranchesController@getDashboard']);
        Route::get('add',['as'=>'-add','uses'=>'BranchesController@getAdd']);
        Route::post('add',['as'=>'-add','uses'=>'BranchesController@postAdd']);
        Route::get('edit/{id}',['as'=>'-edit','uses'=>'BranchesController@getEdit']);
        Route::post('edit',['as'=>'-edit','uses'=>'BranchesController@postEdit']);
        Route::get('delete/{id}',['as'=>'-delete','uses'=>'BranchesController@getDelete']);
    });

    Route::group(['prefix'=>'branches', 'as'=>'branches'],function(){
        Route::get('',['as'=>'','uses'=>'BranchesController@getBranches']);
        Route::get('{branch_name}/{?page_name}',['as'=>'-branch','uses'=>'BranchesController@getBranch']);
    });
});