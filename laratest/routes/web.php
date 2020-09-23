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
Route::get('/invoice', function(){
	//return view('invoice');
	$pdf = PDF::loadview('invoice');
	return $pdf->download('invoice.pdf');
});

//login
Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@verify')->name('login.index');


//Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));

Route::group(['middleware'=>['sess']], function(){

Route::get('/admin', 'HomeController@index')->name('admin.index');
Route::get('admin/admin_request', 'HomeController@request')->name('admin.request');
Route::get('admin/update', 'HomeController@update');
Route::post('admin/update', 'HomeController@update_save');
Route::get('admin/allemp', 'HomeController@allemp')->name('admin.allemp');
Route::get('admin/allcustomer', 'HomeController@allcustomer')->name('admin.allcustomer');
Route::get('admin/accept/{id}', 'HomeController@accept');
Route::get('admin/reject/{id}', 'HomeController@reject');
Route::get('admin/block/{id}', 'HomeController@block');
Route::get('admin/addadmin', 'HomeController@addadmin');
Route::post('admin/addadmin', 'HomeController@addadmin_save');
Route::get('admin/addmanager', 'HomeController@addmanager');
Route::post('admin/addmanager', 'HomeController@addmanager_save');
Route::get('admin/adddelivery', 'HomeController@adddelivery');
Route::post('admin/adddelivery', 'HomeController@adddelivery_save');
Route::get('admin/give/{id}', 'HomeController@give')->name('admin.give');
Route::post('admin/give/{id}', 'HomeController@give_post');
Route::get('admin/updateuser', 'HomeController@updateuser');
Route::get('admin/update/{id}', 'HomeController@updateEmp');
Route::post('admin/update/{id}', 'HomeController@updateEmp_post');
Route::get('admin/download/{id}', 'HomeController@export');
Route::get('admin/download/{id}', 'HomeController@export1');

Route::get('admin/delete/{id}', 'HomeController@delete');
Route::get('admin/ingredient', 'HomeController@ingredient');

  });

Route::get('/logout', 'LogoutController@index');
