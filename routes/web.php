<?php

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

// Administrator Sections
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'administrator'], function(){

	Route::get('/',[
		'as'	=>	'dashboard',
		'uses'	=>	'Admin\AdministratorController@index'
	]);

	Route::resource('role', 'Admin\RoleController');

	Route::resource('user', 'UserController');

	Route::resource('lapangan', 'LapanganController');

	Route::resource('slot', 'SlotController');

	Route::resource('seat', 'SeatController');

	Route::get('/application-menus',[
		'as'	=>	'app.menu',
		'uses'	=>	'Admin\MenuController@index'
	]);
});

// Member Sections
Route::group(['prefix'=>'member','as'=>'member.'], function(){

	Route::get('/',[
		'as'	=>	'dashboard',
		'uses'	=>	'Member\MemberController@index'
	]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('lapangan/{name}', 'Member\LapanganController@findByName')->name('search.lapangan');
