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
Route::post('/cekLogin', 'Auth\LoginController@cekLogin')->name("cekLogin");

//home 
Route::get('/', 'HomeController@index')->name("home");

//home 
Route::get('/belajar', 'LoginController@index')->name("login");

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