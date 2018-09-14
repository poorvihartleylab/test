<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/new-role', function(){
	return view('add-role');
});

Route::get('/', 'UserController@index');

Route::post('/store', 'UserController@store')->name('save-user');

Route::post('/store_roles', 'RoleController@store')->name('save-role');

Route::get('/list', 'UserController@listUsers');

Route::get('/new-mobile', function(){
	return view('add-mobile');
});

Route::post('/mobile', 'MobileController@store')->name('save-mobile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home1', function(){
	return view('home1');
});

Route::get('/alert', function (){
    return view('alert');
});

Route::post('/add-alert', 'alertC@store');
?>

