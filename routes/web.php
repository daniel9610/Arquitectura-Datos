<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleSware group. Now create something great!
|
*/

Route::get('/', 'PaginaPrincipal@index');

Route::get('/AgregarCategoria', 'Administrador@VistaAgregarCategoria');

Route::post('/GuardarCategoria', 'Administrador@GuardarCategoria');

Route::get('/AgregarAdministracion', 'Administrador@VistaAgregarAdministrador');

Route::get('/AgregarProducto', 'GestorProductos@VistaAgregarProducto');

Route::post('/GuardarProducto', 'GestorProductos@GuardarProducto');

Route::get('/VerImportacionProductosMasivamente', 'GestorProductos@VistaImportacionMasiva');

Route::post('/ImportarPrudctosMasivamente', 'GestorProductos@GuardarImportarProductosMasivamente');

Route::get('/ListarProductos', 'ModifiadorProducto@VistaListarProducto');

Route::get('/EliminarProductos/{u}', 'ModifiadorProducto@EliminarProducto');

Route::get('/ModificarProductos/{u}', 'ModifiadorProducto@ModificarProducto');

Route::post('/GuardarModificacionProducto', 'ModifiadorProducto@GuardarModificacionProducto');

Route::get('/EliminarImagen/{u}', 'ModifiadorProducto@EliminarImagen');

Route::get('/PanelAdministracion', 'Administrador@index');

Route::get('/VerEliminarAdministrador', 'Administrador@VistaEliminarAdministrador');

Route::get('/EliminarAdministrador/{u}', 'Administrador@EliminarAdministrador');

Route::get('/VerProductos/{c}', 'PresentacionProducto@MostrarProductos');

Route::get('/VerInformacionProductos/{c}', 'PresentacionProducto@MostrarDetallesDelProducto');

Route::get('/ListarParaModificarAdministrador', 'Administrador@VistaListaModificarAdministrador');

Route::get('/ModificarAdministrador/{u}', 'Administrador@VistaModificarAdministrador');

Route::post('/GuardarModificacionAdministrador', 'Administrador@GuardarModificacionAdministrador');

Route::get('/CambiarContrasenaAdministrador', 'Administrador@VistaCambiarContrasenaAdministrador');

Route::post('/GuardarCambiarContrasenaAdministrador', 'Administrador@GuardarCambiarContrasenaAdministrador');

Route::post('/BuscarProductoBarraDeBusqueda', 'PresentacionProducto@BuscarProducto');

Route::get('/VerHistoria', 'PaginaPrincipal@VistaVerHistoria');

Route::get('/VerContactos', 'PaginaPrincipal@VistaVerContactos');

Route::post('/AgregarCarrito', 'PresentacionProducto@TomarDatosCarrito');

Route::get('/VerCarrito', 'GestorCarrito@VerCarrito');

Route::get('/EliminarProductoCarrito/{c}', 'GestorCarrito@BorrarProductosCarrito');

Route::get('/GestionarTransaccion', 'GestorCarrito@GestionarTrasaccion');

Route::post('/GuardarTransaccion', 'GestorCarrito@GuardarTransaccion');

Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);


