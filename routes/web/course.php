<?php
Route::group(['prefix' => 'course'], function () {
Route::get('/', 'CoursesController@index')->name("course.index");
Route::get('/dataTable', 'CoursesController@dataTable')->name("course.dataTable");
Route::post('/insert', 'CoursesController@store')->name("course.insert");
Route::get('/edit', 'CoursesController@edit')->name("course.edit");
Route::post('/update', 'CoursesController@update')->name("course.update");
Route::delete('/delete', 'CoursesController@destroy')->name("course.destroy");
});