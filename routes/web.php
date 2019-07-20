<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


// Auth
Route::get('/login', 'Auth\LoginController@index')->name("login");
Route::get('/logout', 'Auth\LoginController@logout')->name("logout");
Route::get('/keluar', 'Auth\LoginController@keluar')->name("keluar");
Route::get('/profileEdit', 'HomeController@profileEdit')->name("profileEdit");
Route::post('/update', 'HomeController@update')->name("update");
Route::post('/cekLogin', 'Auth\LoginController@cekLogin')->name("cekLogin");
Route::post('/daftar', 'Auth\LoginController@daftar')->name("daftar");
Auth::routes(['verify' => true]);

//home 
Route::get('/', 'HomeController@index')->name("home"); 
Route::get('/belajar', 'BelajarController@index')->name("belajar");
Route::get('/matkul/{slug}', 'BelajarController@matakuliah')->name("matkul");
Route::get('/jalur-materi/{slug}', 'BelajarController@jalur')->name("path");
Route::get('/level-materi/{slug}', 'BelajarController@level')->name("levels");
Route::get('/materi', 'BelajarController@materi')->name("materi");
Route::get('/materi/view{id}', 'BelajarController@viewMateri')->name("viewmateri");
Route::get('/materi2/{slug}', 'BelajarController@materi2')->name("materi2");
// Admin
Route::get('/dashboard', 'HomeController@dashboard')->name("dashboard");
require 'web/course.php';
require 'web/lesson.php';
require 'web/subject.php';
require 'web/path.php';
require 'web/level.php';
require 'web/menu.php';
require 'web/submenu.php';
require 'web/aksesmenu.php';
require 'web/role.php';
require 'web/user.php';
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
