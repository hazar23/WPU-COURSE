<?php
Route::group(['prefix' => 'user'], function () {
Route::get('/', 'UserController@index')->name("user.index");
Route::get('/dataTable', 'UserController@dataTable')->name("user.dataTable");
Route::post('/insert', 'UserController@store')->name("user.insert");
Route::get('/edit', 'UserController@edit')->name("user.edit");
Route::post('/update', 'UserController@update')->name("user.update");
Route::delete('/delete', 'UserController@destroy')->name("user.destroy");
});