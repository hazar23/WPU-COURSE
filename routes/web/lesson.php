<?php
Route::group(['prefix' => 'lesson'], function () {
Route::get('/', 'LessonController@index')->name("lesson.index");
Route::get('/dataTable', 'LessonController@dataTable')->name("lesson.dataTable");
Route::post('/insert', 'LessonController@store')->name("lesson.insert");
Route::get('/edit', 'LessonController@edit')->name("lesson.edit");
Route::post('/update', 'LessonController@update')->name("lesson.update");
Route::delete('/delete', 'LessonController@destroy')->name("lesson.destroy");
});