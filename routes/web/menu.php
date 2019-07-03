<?php
Route::group(['prefix' => 'menu'], function () {
Route::get('/', 'MenuController@index')->name("menu.index");
Route::get('/dataTable', 'MenuController@dataTable')->name("menu.dataTable");
Route::post('/insert', 'MenuController@store')->name("menu.insert");
Route::get('/edit', 'MenuController@edit')->name("menu.edit");
Route::post('/update', 'MenuController@update')->name("menu.update");
Route::delete('/delete', 'MenuController@destroy')->name("menu.destroy");
});