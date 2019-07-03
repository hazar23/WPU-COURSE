<?php
Route::group(['prefix' => 'subject'], function () {
Route::get('/', 'SubjectController@index')->name("subject.index");
Route::get('/dataTable', 'SubjectController@dataTable')->name("subject.dataTable");
Route::post('/insert', 'SubjectController@store')->name("subject.insert");
Route::get('/edit', 'SubjectController@edit')->name("subject.edit");
Route::post('/update', 'SubjectController@update')->name("subject.update");
Route::delete('/delete', 'SubjectController@destroy')->name("subject.destroy");
});