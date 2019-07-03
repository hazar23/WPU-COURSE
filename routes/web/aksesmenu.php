<?php
Route::group(['prefix' => 'aksesmenu'], function () {
Route::get('/', 'AksesMenuController@index')->name("aksesmenu.index");
Route::get('/dataTable', 'AksesMenuController@dataTable')->name("aksesmenu.dataTable");
Route::post('/insert', 'AksesMenuController@store')->name("aksesmenu.insert");
Route::get('/edit', 'AksesMenuController@edit')->name("aksesmenu.edit");
Route::post('/update', 'AksesMenuController@update')->name("aksesmenu.update");
Route::delete('/delete', 'AksesMenuController@destroy')->name("aksesmenu.destroy");
});