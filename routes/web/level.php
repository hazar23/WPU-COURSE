<?php
Route::group(['prefix' => 'level'], function () {
Route::get('/', 'LevelController@index')->name("level.index");
Route::get('/dataTable', 'LevelController@dataTable')->name("level.dataTable");
Route::post('/insert', 'LevelController@store')->name("level.insert");
Route::get('/edit', 'LevelController@edit')->name("level.edit");
Route::post('/update', 'LevelController@update')->name("level.update");
Route::delete('/delete', 'LevelController@destroy')->name("level.destroy");
});