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




Route::get('/admin', 'HomeController@index');
Route::get('admin/admin_request', 'HomeController@request');
Route::get('admin/update', 'HomeController@update');
Route::post('admin/update', 'HomeController@update_save');
Route::get('admin/allemp', 'HomeController@allemp');
Route::get('admin/allcustomer', 'HomeController@allcustomer');
Route::get('admin/addadmin', 'HomeController@addadmin');
Route::post('admin/addadmin', 'HomeController@addadmin_save');
Route::get('admin/addmanager', 'HomeController@addmanager');
Route::post('admin/addmanager', 'HomeController@addmanager_save');
Route::get('admin/adddelivery', 'HomeController@adddelivery');
Route::post('admin/adddelivery', 'HomeController@adddelivery_save');
Route::get('admin/discount', 'HomeController@discount');
Route::get('admin/updateuser', 'HomeController@updateuser'); 
Route::get('admin/ingredient', 'HomeController@ingredient');                




