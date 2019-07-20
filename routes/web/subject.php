<?php
Route::group(['prefix' => 'matakuliah'], function () {
Route::get('/', 'SubjectController@index')->name("matakuliah.index");
Route::get('/dataTable', 'SubjectController@dataTable')->name("matakuliah.dataTable");
Route::post('/insert', 'SubjectController@store')->name("matakuliah.insert");
Route::get('/edit', 'SubjectController@edit')->name("matakuliah.edit");
Route::post('/update', 'SubjectController@update')->name("matakuliah.update");
Route::delete('/delete', 'SubjectController@destroy')->name("matakuliah.destroy");
});