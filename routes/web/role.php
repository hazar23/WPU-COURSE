<?php
Route::group(['prefix' => 'role'], function () {
Route::get('/', 'RoleController@index')->name("role.index");
Route::get('/dataTable', 'RoleController@dataTable')->name("role.dataTable");
Route::post('/insert', 'RoleController@store')->name("role.insert");
Route::get('/edit', 'RoleController@edit')->name("role.edit");
Route::post('/update', 'RoleController@update')->name("role.update");
Route::delete('/delete', 'RoleController@destroy')->name("role.destroy");
});