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
});
