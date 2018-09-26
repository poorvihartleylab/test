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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/registeration', 'UserController@registeration')->name('registeration');

Route::post('/store', 'UserController@store')->name('save-user');

Route::middleware(['auth'])->group(function () {
	
	Route::get('/list', 'UserController@listUsers')->name('list');
	
	Route::get('edit/{user_id}', 'UserController@edit')->name('edit-user');

	Route::post('update/{user_id}', 'UserController@update');

	Route::get('destroy/{user_id}', 'UserController@destroy')->name('destroy-user');
	
	Route::get('/add-role', function () {
	    return view('add-role');
	})->name('add-role');

	Route::post('/store_roles', 'RoleController@store')->name('save-role');
	
	Route::get('/role-list', 'RoleController@list')->name('role-list');

    Route::get('edit-role/{role_id}', 'RoleController@edit')->name('edit-role');

    Route::post('update-role/{role_id}', 'RoleController@update');

	Route::get('destroy-role/{role_id}', 'RoleController@destroy')->name('destroy-role');
	
	Route::post('/storebanner', 'BannerController@storebanner')->name('save-banner');

	Route::get('/show-banner', 'BannerController@showBanner')->name('show-banner');

});

Route::get('/new-mobile', function(){
	return view('add-mobile');
});

Route::post('/mobile', 'MobileController@store')->name('save-mobile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

?>

