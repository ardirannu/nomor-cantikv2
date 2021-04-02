<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/dashboard', 'dashboard\DashboardController@index')->name('dashboard'); 
    Route::resource('admin/produk/nomor', 'produk\NomorController');
    Route::patch('admin/produk/nomor/{id}/updatestatus', 'produk\NomorController@updatestatus');
    Route::post('admin/produk/nomor/import_excel', 'produk\NomorController@import_excel');
    Route::resource('admin/pelanggan', 'pelanggan\PelangganController');
    Route::resource('admin/toko', 'toko\TokoController');
    Route::resource('admin/role', 'role\RoleController');
    Route::resource('admin/user', 'user\UserController');
    Route::resource('admin/admin', 'admin\Role_UserController');
    
}); 
    Route::get('/', 'HomeController@index')->name('home.index'); 
    Route::get('modal/{id}', 'ModalController@index')->name('modal.index'); 
    Route::get('operator/{id}', 'OperatorController@index')->name('operator.data'); 
    Route::get('operator/modal/{id}', 'ModaloperatorController@index')->name('operator.modal'); 
    Route::get('search/modal/{id}', 'ModalsearchController@index')->name('search.modal'); 
    Route::get('search', 'SearchController@search')->name('search'); 
    Auth::routes();
    

