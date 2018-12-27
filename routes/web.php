<?php

use App\Events\OrderStatusChangedEvent;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/fire', function () {
	event(new OrderStatusChangedEvent());
	return 'fired';
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

	Route::get('laporan-penyewaan','ReportController@index')->name('report.index');

	Route::get('order-list-member','Admin\OrderController@index')->name('order.list');

	Route::post('verify-payment', 'Admin\VerifiedPaymentController@verify')->name('verify.payment');

	Route::post('reject-payment', 'Admin\VerifiedPaymentController@reject')->name('reject.payment');

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

	Route::get('my-order', 'Member\OrderController@myOrder')->name('order.list');

	Route::get('upload-payment/{code}', 'Member\OrderController@uploadPayment')->name('payment.create');

	Route::post('upload-payment', 'Member\UploadPaymentController@upload')->name('payment.store');

	Route::post('order-seat', 'Member\OrderController@store')->name('user.order');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('lapangan/all','Member\LapanganController@index')->name('lapangan.index');

Route::get('lapangan/{name}', 'Member\LapanganController@findByName')->name('lapangan.show');
