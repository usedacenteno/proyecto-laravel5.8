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

Route::get('/', 'InicioController@index')->name('inicio');
Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('', 'AdminController@index');
    Route::get('permiso', 'PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso');
    /*RUTAS DEL MENU*/
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/crear', 'MenuController@crear')->name('crear_menu');
    Route::post('menu', 'MenuController@guardar')->name('guardar_menu');
    Route::get('menu/{id}/editar','MenuController@editar')->name('editar_menu');
    Route::put('menu/{id}','MenuController@actualizar')->name('actualizar_menu');
    Route::get('menu/{id}/eliminar', 'MenuController@eliminar')->name('eliminar_menu');
    Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
    /*RUTAS */
    Route::get('rol', 'RolController@index')->name('rol');
    Route::get('rol/crear', 'RolController@crear')->name('crear_rol');
    Route::post('rol', 'RolController@guardar')->name('guardar_rol');
    Route::get('rol/{id}/editar', 'RolController@editar')->name('editar_rol');/*Funciona para poder editar los roles+*/
    Route::put('rol/{id}', 'RolController@actualizar')->name('actualizar_rol');
    Route::delete('rol/{id}', 'RolController@eliminar')->name('eliminar_rol');
    /*RUTAS MENU_ROL*/
    Route::get('menu-rol', 'MenuRolController@index')->name('menu_rol');
    Route::post('menu-rol', 'MenuRolController@guardar')->name('guardar_menu_rol');
    //rutas del almacen Categoria
    Route::get('almacen/categoria', 'CategoriaController@index')->name('vista_categoria');
    Route::get('categoria/crear', 'CategoriaController@create')->name('crear_categoria');
    Route::post('categoria', 'categoriaController@store')->name('guardar_categoria');
    Route::get('almacen/categoria/{id}/editar', 'CategoriaController@edit')->name('editar_categoria');
    Route::put('almacen/categoria/{id}','CategoriaController@update')->name('actualizar_categoria');
    Route::get('almacen/categoria/{id}/eliminar', 'CategoriaController@destroy')->name('eliminar_categoria');
    //Rutas del almacen articulo
    Route::get('almacen/articulo', 'ArticuloController@index')->name('vista_articulo');
    Route::get('articulo/crear', 'ArticuloController@create')->name('crear_articulo');
    Route::post('articulo', 'ArticuloController@store')->name('guardar_articulo');
    Route::get('almacen/articulo/{id}/editar', 'ArticuloController@edit')->name('editar_articulo');
    Route::put('almacen/articulo/{id}','ArticuloController@update')->name('actualizar_articulo');
    Route::get('almacen/articulo/{id}/eliminar', 'ArticuloController@destroy')->name('eliminar_articulo');
    //Rutas de Ventas Cliente
    Route::get('ventas/cliente', 'ClienteController@index')->name('vista_cliente');
    Route::get('cliente/crear', 'ClienteController@create')->name('crear_cliente');
    Route::post('cliente', 'ClienteController@store')->name('guardar_cliente');
    Route::get('ventas/cliente/{id}/editar', 'ClienteController@edit')->name('editar_cliente');
    Route::put('ventas/cliente/{id}','ClienteController@update')->name('actualizar_cliente');
    Route::get('ventas/cliente/{id}/eliminar', 'ClienteController@destroy')->name('eliminar_cliente');
    //Ruta de compras proveedor
    Route::get('compras/proveedor', 'ProveedorController@index')->name('vista_proveedor');
    Route::get('proveedor/crear', 'ProveedorController@create')->name('crear_proveedor');
    Route::post('proveedor', 'ProveedorController@store')->name('guardar_proveedor');
    Route::get('compras/proveedor/{id}/editar', 'ProveedorController@edit')->name('editar_proveedor');
    Route::put('compras/proveedor/{id}','ProveedorController@update')->name('actualizar_proveedor');
    Route::get('compras/proveedor/{id}/eliminar', 'ProveedorController@destroy')->name('eliminar_proveedor');
    //Rutas de compras Ingresos
    Route::get('compras/ingresos', 'IngresoController@index')->name('vista_ingreso');
    Route::get('ingreso/crear', 'IngresoController@create')->name('crear_ingreso');
    Route::post('ingreso', 'IngresoController@store')->name('guardar_ingreso');
    Route::get('compras/ingreso/{id}/mostrar', 'IngresoController@show')->name('mostrar_ingreso');
    Route::put('compras/ingreso/{id}','IngresoController@update')->name('actualizar_ingreso');
    Route::get('compras/ingreso/{id}/eliminar', 'IngresoController@destroy')->name('eliminar_ingreso');
});






