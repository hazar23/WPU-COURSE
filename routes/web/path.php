<?php
Route::group(['prefix' => 'jalur'], function () {
Route::get('/', 'PathController@index')->name("jalur.index");
Route::get('/dataTable', 'PathController@dataTable')->name("jalur.dataTable");
Route::post('/insert', 'PathController@store')->name("jalur.insert");
Route::get('/edit', 'PathController@edit')->name("jalur.edit");
Route::post('/update', 'PathController@update')->name("jalur.update");
Route::delete('/delete', 'PathController@destroy')->name("jalur.destroy");
});