<?php

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

Route::view('/', 'home')->name('home');;

Route::view('/contact', 'contact')->name('contact');
Route::post('contact', 'MessageController@store')->name('massage.store');

Route::resource('projects','ProjectController')->middleware('auth');
Route::resource('products','ProductController')->middleware('auth');
Route::resource('brands','BrandController')->middleware('auth');
Route::resource('products','ProductController')->middleware('auth');
Route::resource('sales','SaleController')->middleware('auth');
Route::post('/sale','SaleController@store_product')->name('store_product')->middleware('auth');
Route::get('/sales/factura/pdf/{id}','SaleController@create_pdf')->name('create_pdf')->middleware('auth');
Route::get('/sales/show-factura/pdf/{id}','SaleController@show_factura')->name('show_factura')->middleware('auth');
Route::get('/sales/factura/pdf/download_pdf/{id}','SaleController@download_pdf')->name('download_pdf')->middleware('auth');
Route::delete('/sales/create/{id}','SaleController@cancel')->name('cancel')->middleware('auth');
Route::delete('/sales/create/terminar/{id}','SaleController@terminar')->name('terminar')->middleware('auth');
Route::delete('/sales/create/detail/{id}','SaleController@delete_detail')->name('delete_detail')->middleware('auth');


//Route::get('/projects','ProjectController@index')->name('projects.index');
//Route::get('/projects/create','ProjectController@create')->name('projects.create');
//Route::get('/projects/{project}/edit','ProjectController@edit')->name('projects.edit');
//Route::patch('/projects/{project}/','ProjectController@update')->name('projects.update');
//Route::post('/projects','ProjectController@store')->name('projects.store');
//Route::get('/projects/{project}','ProjectController@show')->name('projects.show');
//Route::delete('/projects/{project}','ProjectController@destroy')->name('projects.destroy');


Route::view('/about', 'about')->name('about');



Auth::routes();

Route::get('/librery/menu', 'HomeController@index')->name('librery.menu');
