<?php

use Illuminate\Support\Facades\Route;
use App\DataTables\OrdersDataTable;
use App\DataTables\PharmaciesDataTable;
use App\DataTables\DoctorsDataTable;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::namespace('Admin')->prefix('admin')->group(function(){

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login')->middleware('guest:admin');
    Route::get('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit')->middleware('guest:admin');
    Route::get('/', 'AdminController@index')->name('admin.index')->middleware('auth:admin');
});



////////////////////////////////
//-----------------------------------------------------------------------

Route::namespace('Doctor')->prefix('doctors')->group(function(){


    Route::get('/login', 'Auth\DoctorLoginController@showLoginForm')->name('doctors.login');
    Route::get('/logout', 'Auth\DoctorLoginController@doctorLogout')->name('doctors.logout');
    Route::post('/login', 'Auth\DoctorLoginController@login')->name('doctors.login.submit');


     Route::get('/datadoctor', function (DoctorsDataTable $datatable) 
       {
              return $datatable->render('doctors/index2');
       })->name('doctors.index2');  
    Route::get('/', 'DoctorController@index')->name('doctors.index');
    Route::get('/create', 'DoctorController@create')->name('doctors.create');
    Route::post('/', 'DoctorController@store')->name('doctors.store');
    Route::get('doctors/{doctor}/edit', 'DoctorController@edit')->name('doctors.edit');
    Route::put('/{doctor}', 'DoctorController@update')->name('doctors.update');
    Route::delete('/{doctor}', 'DoctorController@destroy')->name('doctors.destroy');
    Route::get('/{doctor}', 'DoctorController@show')->name('doctors.show');
    Route::get('/ban/{doctor}', 'DoctorController@ban')->name('Doctor.ban');
    Route::get('/unban/{doctor}', 'DoctorController@unban')->name('Doctor.unban');
});

//----------------------------------------------------------------------------


Route::get('/dataorder', function (OrdersDataTable $datatable)
{
    return $datatable->render('orders/index2');
})->name('orders.index2'); ;
Route::get('/orders', 'OrderController@index')->name('orders.index');
Route::get('/orders/create', 'OrderController@create')->name('orders.create');
Route::post('/orders', 'OrderController@store')->name('orders.store');
Route::delete('/orders/{order}', 'OrderController@destroy')->name('orders.destroy');
Route::post('/orders/fetch', 'OrderController@fetch')->name('orders.fetch');

//----------------------------------------------------------------------------

Route::namespace('Pharmacy')->prefix('pharmacy')->group(function(){

    Route::get('/login', 'Auth\PharmacyLoginController@showLoginForm')->name('pharmacy.login');
    Route::get('/logout', 'Auth\PharmacyLoginController@pharmacyLogout')->name('pharmacy.logout');
    Route::post('/login', 'Auth\PharmacyLoginController@login')->name('pharmacy.login.submit');
    
    
//    Route::get('/', 'PharmacyController@index')->name('pharmacy.index');
   Route::get('/', function (PharmaciesDataTable $datatable)
  {
      return $datatable->render('pharmacies/index');
  })->name('pharmacy.index'); 
    Route::get('/create','PharmacyController@create')->name('pharmacy.create');
    Route::post('/','PharmacyController@store')->name('pharmacy.store');
    Route::get('/{pharmacy}','PharmacyController@show')->name('pharmacy.show');
    Route::GET('/{pharmacy}/edit','PharmacyController@edit')->name('pharmacy.edit');
    Route::post('/{pharmacy}' ,'PharmacyController@update')->name('pharmacy.update');
    Route::get('/{pharmacy}/delete','PharmacyController@destroy')->name('pharmacy.destory');
    Route::get('/{pharmacy}/delete','PharmacyController@destroy')->name('pharmacy.destory');


});
Route::get('/revenues', 'RevenueController@index')->name('revenue.index');
