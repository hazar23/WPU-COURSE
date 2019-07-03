<?php
Route::group(['prefix' => 'path'], function () {
Route::get('/', 'PathController@index')->name("path.index");
Route::get('/dataTable', 'PathController@dataTable')->name("path.dataTable");
Route::post('/insert', 'PathController@store')->name("path.insert");
Route::get('/edit', 'PathController@edit')->name("path.edit");
Route::post('/update', 'PathController@update')->name("path.update");
Route::delete('/delete', 'PathController@destroy')->name("path.destroy");
});