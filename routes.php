<?php

//si se busca la raiz se valida y si no esta logeado redirecciona al login

// ------------------------------------------Ruta raiz o login------------------------------------------------------
Route::get('/', array('before' => 'validate', function(){
	return View::make('login');
}));

Route::get('login', array('before' => 'validate', function(){
	return View::make('login');
}));

Route::post('check', 'LoginController@check');

Route::get('logout', 'LoginController@logout');

Route::get('inicio', array('before' => 'auth', function(){ 
	return View::make('inicio.index');
}));
// ------------------------------------------Fin Login-----------------------------------------------------
// Route::get('inicio', function()
// {
// 	return View::make('inicio.index');
// });

// Route::get('login', function()
// {
// 	return View::make('login');
// });

Route::group(array('before' => 'auth'), function ()
{

	// -----------------------------------------Rutas estados----------------------------------------------------
Route::get('estados', 'EstadoController@index');
Route::post('createEstado', 'EstadoController@create');
Route::get('viewEstado/{id}', 'EstadoController@get');
Route::get('editEstado/{id}', 'EstadoController@getEdit');
Route::post('editEstado/{id}', 'EstadoController@edit');
Route::get('deleteEstado/{id}', 'EstadoController@delete');
// -----------------------------------------Fin rutas estados-----------------------------------------------

// -----------------------------------------Rutas ciudades----------------------------------------------------
Route::get('ciudades', 'CiudadController@index');
Route::post('createCiudad', 'CiudadController@create');
Route::get('viewCiudad/{id}', 'CiudadController@get');
Route::get('editCiudad/{id}', 'CiudadController@getEdit');
Route::post('editCiudad/{id}', 'CiudadController@edit');
Route::get('deleteCiudad/{id}', 'CiudadController@delete');
// -----------------------------------------Fin rutas ciudades-----------------------------------------------

// -----------------------------------------Rutas marcas----------------------------------------------------
Route::get('marcas', 'MarcaController@index');
Route::post('createMarca', 'MarcaController@create');
Route::get('viewMarca/{id}', 'MarcaController@get');
Route::get('editMarca/{id}', 'MarcaController@getEdit');
Route::post('editMarca/{id}', 'MarcaController@edit');
Route::get('deleteMarca/{id}', 'MarcaController@delete');
// -----------------------------------------Fin rutas marcas-----------------------------------------------

// -----------------------------------------Rutas colores----------------------------------------------------
Route::get('colores', 'ColorController@index');
Route::post('createColor', 'ColorController@create');
Route::get('viewColor/{id}', 'ColorController@get');
Route::get('editColor/{id}', 'ColorController@getEdit');
Route::post('editColor/{id}', 'ColorController@edit');
Route::get('deleteColor/{id}', 'ColorController@delete');
// -----------------------------------------Fin rutas colores-----------------------------------------------

// -----------------------------------------Rutas tipo de elementos----------------------------------------------------
Route::get('tipoElementos', 'TipoElementoController@index');
Route::post('createTipoElemento', 'TipoElementoController@create');
Route::get('viewTipoElemento/{id}', 'TipoElementoController@get');
Route::get('editTipoElemento/{id}', 'TipoElementoController@getEdit');
Route::post('editTipoElemento/{id}', 'TipoElementoController@edit');
Route::get('deleteTipoElemento/{id}', 'TipoElementoController@delete');
// -----------------------------------------Fin rutas tipo de elementos-----------------------------------------------

// -----------------------------------------Rutas tipo de clientes----------------------------------------------------
Route::get('clientes', 'ClienteController@index');
Route::post('createCliente', 'ClienteController@create');
Route::get('viewCliente/{id}', 'ClienteController@get');
Route::get('editCliente/{id}', 'ClienteController@getEdit');
Route::post('editCliente/{id}', 'ClienteController@edit');
Route::get('deleteCliente/{id}', 'ClienteController@delete');
// -----------------------------------------Fin rutas tipo de clientes-----------------------------------------------

// -----------------------------------------Rutas tipo de empleados----------------------------------------------------
Route::get('empleados', 'EmpleadoController@index');
Route::post('createEmpleado', 'EmpleadoController@create');
Route::get('viewEmpleado/{id}', 'EmpleadoController@get');
Route::get('editEmpleado/{id}', 'EmpleadoController@getEdit');
Route::post('editEmpleado/{id}', 'EmpleadoController@edit');
Route::get('deleteEmpleado/{id}', 'EmpleadoController@delete');
Route::get('desactivarEmpleado/{id}', 'EmpleadoController@inactivo');
Route::get('activarEmpleado/{id}', 'EmpleadoController@activo');
// -----------------------------------------Fin rutas tipo de empleados-----------------------------------------------

// -----------------------------------------Rutas tipo de elementos----------------------------------------------------
Route::get('elementos', 'ElementoController@index');
Route::post('createElemento', 'ElementoController@create');
Route::get('viewElemento/{id}', 'ElementoController@get');
Route::get('editElemento/{id}', 'ElementoController@getEdit');
Route::post('editElemento/{id}', 'ElementoController@edit');
Route::get('deleteElemento/{id}', 'ElementoController@delete');
// -----------------------------------------Fin rutas tipo de elementos-----------------------------------------------

// -----------------------------------------Rutas tipo de empenos----------------------------------------------------
Route::get('empenos', 'EmpenoController@index');
Route::post('createEmpeno', 'EmpenoController@create');
Route::get('viewEmpeno/{id}', 'EmpenoController@get');
Route::get('editEmpeno/{id}', 'EmpenoController@getEdit');
Route::post('editEmpeno/{id}', 'EmpenoController@edit');
Route::get('deleteEmpeno/{id}', 'EmpenoController@delete');
// -----------------------------------------Fin rutas tipo de empenos-----------------------------------------------

// -----------------------------------------Rutas tipo de pagos----------------------------------------------------
Route::get('pagos', 'PagoController@index');
Route::post('listadoPago', 'PagoController@consultar');
Route::get('generarPago/{id}', 'PagoController@generar');
Route::post('createPago', 'PagoController@create');

Route::get('viewPago/{id}', 'PagoController@get');
Route::get('editPago/{id}', 'PagoController@getEdit');
Route::post('editPago/{id}', 'PagoController@edit');
Route::get('deletePago/{id}', 'PagoController@delete');
// -----------------------------------------Fin rutas tipo de pagos-----------------------------------------------


});

