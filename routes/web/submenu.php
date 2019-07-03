<?php
Route::group(['prefix' => 'submenu'], function () {
Route::get('/', 'SubMenuController@index')->name("submenu.index");
Route::get('/dataTable', 'SubMenuController@dataTable')->name("submenu.dataTable");
Route::post('/insert', 'SubMenuController@store')->name("submenu.insert");
Route::get('/edit', 'SubMenuController@edit')->name("submenu.edit");
Route::post('/update', 'SubMenuController@update')->name("submenu.update");
Route::delete('/delete', 'SubMenuController@destroy')->name("submenu.destroy");
});