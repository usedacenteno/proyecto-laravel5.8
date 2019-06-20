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

Route::get('/','InicioController@index');
Route::get('admin/permiso', 'Admin\PermisoController@index');
Route::get('admin/permiso/crear', 'Admin\PermisoController@crear');
Route::get('admin/menu', 'Admin\MenuController@index');
Route::get('admin/menu/crear', 'Admin\MenuController@crear');
Route::post('admin/menu', 'Admin\MenuController@guardar')->name('guardar_menu');



