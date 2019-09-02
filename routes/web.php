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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware'=>['auth']], function() {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/profile', 'HomeController@profile');
  Route::post('profile/photo', 'HomeController@profileUploadPhoto')->name('profile.upload.photo');
  Route::get('/lockscreen', 'HomeController@lockscreen');
  //RUTAS DE LA CONFIGURACION
  Route::resource('roles','RoleController');
  Route::resource('user','UserController');
  Route::resource('permissions', 'PermissionController');


  Route::resource('catpaisdivisions', 'catpaisdivisionController');

  Route::resource('catareaciudads', 'catareaciudadController');

  Route::resource('contratistas', 'contratistasController');

  Route::resource('catproductos', 'catproductosController');

  Route::resource('proyectos', 'proyectosController');

  Route::get('proyecto/{id}/terminar', 'proyectosController@terminar');

  Route::resource('documentos', 'documentosController');
  Route::get('verdoc/{id}', 'documentosController@showdoc');

  Route::resource('tareas', 'tareasController');
  Route::post('tareas/avance', 'tareasController@registroavance')->name('tareas.avanceregistro');

  Route::get('tareas/todas/all', 'tareasController@todasindex')->name('tareas.todas');

  Route::resource('empleados', 'empleadosController');

  Route::get('asistencia', 'asistenciaController@index')->name('asistencia');
  Route::post('asistencia/filtro/fecha', 'asistenciaController@filtrofecha')->name('asistencia.fecha');
  Route::post('asistencia/registrar', 'asistenciaController@registrar')->name('asistencia.registrar');
  Route::post('asistencia/reporte', 'asistenciaController@reportemensual')->name('asistencia.reporte');

  //inventarios
  Route::resource('categorias', 'categoriasController');
  Route::resource('productos', 'productosController');
  Route::resource('bodegas', 'bodegasController');
  Route::resource('clientes', 'clientesController');
  Route::resource('invproveedores', 'invproveedoresController');

  Route::resource('invoperacions', 'invoperacionController');
  Route::get('inventario/entrada', 'invoperacionController@entrada')->name('inventario.entrada');
  Route::get('inventario/salida', 'invoperacionController@salida')->name('inventario.salida');
  Route::post('inventario/entrada/registro', 'invoperacionController@regentrada')->name('inventario.regentrada');
  Route::post('inventario/salida/registro', 'invoperacionController@regsalida')->name('inventario.regsalida');
  Route::get('precio/venta/producto/{id}', 'invoperacionController@precioventaproducto');
  Route::get('precio/compra/producto/{id}', 'invoperacionController@preciocompraproducto');
  Route::post('inventario/operacion/producto/{id}/surtidototal', 'invoperacionController@surtidototalproducto')->name('inventario.producto.surtido.total');
  Route::post('inventario/operacion/producto/{id}/surtidoparcial', 'invoperacionController@surtidoparcialproducto')->name('inventario.producto.surtido.parcial');
  Route::get('inventario/informe/productos', 'invoperacionController@verinformeproductos')->name('inventario.informe.productos');
  Route::get('inventario/informe/ver1', 'invoperacionController@informeVer1');
  Route::get('inventario/informe/ver2', 'invoperacionController@informeVer2');

  Route::resource('docscategorias', 'docscategoriasController');
});
