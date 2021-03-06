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
    return view('index');
});


Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('estadoevaluacion', 'EstadoEvaluacionController@index')->name('reportes.index');
Route::get('resultadoevaluacion', 'ResultadoEvaluacionController@index')->name('resultado.index');
Route::get('estadocertificacion', 'EstadoCertificacionController@index')->name('reportesc.index');
Route::get('resultadocertificacion', 'ResultadoCertificacionController@index')->name('resultadoc.index');
/*Route::get('rca', 'EstudiosevaluadosController@index')->name('rca.index');*/
Route::get('entidadesr/{request}', 'EntidadesregistradasController@index')->name('entidadesr.index');
Route::post('estadoevaluacion/listardocumento', 'EstadoEvaluacionController@listardocumento')->name('estadoevaluacion.listardocumento');
Route::post('estadocertificacion/listardocumento', 'EstadoCertificacionController@listardocumento')->name('estadocertificacion.listardocumento');
Auth::routes();
Route::get('/admin/index', 'AdminController@index')->name('admin.index');
//Route::get('/home', 'HomeController@index')->name('home');
//Middleware
Route::middleware(['auth'])->group(function(){
//INDEX    
/*Route::get('/admin',function(){
    return view('admin.index');
});*/
//FIN INDEX

//MANTENIMIENTO GENERAL

//Actividad

Route::post('admin/actividad/store','ActividadController@store')->name('admin.actividad.store')
->middleware('permission:admin.actividad.create');

Route::get('admin/actividad','ActividadController@index')->name('admin.actividad.index')
->middleware('permission:admin.actividad.index');

Route::get('admin/actividad/create','ActividadController@create')->name('admin.actividad.create')
->middleware('permission:admin.actividad.create');

Route::put('admin/actividad/{role}','ActividadController@update')->name('admin.actividad.update')
->middleware('permission:admin.actividad.edit');

Route::get('admin/actividad/{role}','ActividadController@show')->name('admin.actividad.show')
->middleware('permission:admin.actividad.show');

Route::delete('admin/actividad/{role}','ActividadController@destroy')->name('admin.actividad.destroy')
->middleware('permission:admin.actividad.destroy');

Route::get('admin/actividad/{role}/edit','ActividadController@edit')->name('admin.actividad.edit')
->middleware('permission:admin.actividad.edit');
//Fin Actividad
//
//Cargo

Route::post('admin/cargo/store','CargoController@store')->name('admin.cargo.store')
->middleware('permission:admin.cargo.create');

Route::get('admin/cargo','CargoController@index')->name('admin.cargo.index')
->middleware('permission:admin.cargo.index');

Route::get('admin/cargo/create','CargoController@create')->name('admin.cargo.create')
->middleware('permission:admin.cargo.create');

Route::put('admin/cargo/{role}','CargoController@update')->name('admin.cargo.update')
->middleware('permission:admin.cargo.edit');

Route::get('admin/cargo/{role}','CargoController@show')->name('admin.cargo.show')
->middleware('permission:admin.cargo.show');

Route::delete('admin/cargo/{role}','CargoController@destroy')->name('admin.cargo.destroy')
->middleware('permission:admin.cargo.destroy');

Route::get('admin/cargo/{role}/edit','CargoController@edit')->name('admin.cargo.edit')
->middleware('permission:admin.cargo.edit');
//Fin Cargo

//Departamento

Route::post('admin/departamento/store','DepartamentoController@store')->name('admin.departamento.store')
->middleware('permission:admin.departamento.create');

Route::get('admin/departamento','DepartamentoController@index')->name('admin.departamento.index')
->middleware('permission:admin.departamento.index');

Route::get('admin/departamento/create','DepartamentoController@create')->name('admin.departamento.create')
->middleware('permission:admin.departamento.create');

Route::put('admin/departamento/{role}','DepartamentoController@update')->name('admin.departamento.update')
->middleware('permission:admin.departamento.edit');

Route::get('admin/departamento/{role}','DepartamentoController@show')->name('admin.departamento.show')
->middleware('permission:admin.departamento.show');

Route::delete('admin/departamento/{role}','DepartamentoController@destroy')->name('admin.departamento.destroy')
->middleware('permission:admin.departamento.destroy');

Route::get('admin/departamento/{role}/edit','DepartamentoController@edit')->name('admin.departamento.edit')
->middleware('permission:admin.departamento.edit');
//Fin Departamento

//Distrito

Route::post('admin/distrito/store','DistritoController@store')->name('admin.distrito.store')
->middleware('permission:admin.distrito.create');

Route::get('admin/distrito','DistritoController@index')->name('admin.distrito.index')
->middleware('permission:admin.distrito.index');

Route::get('admin/distrito/create','DistritoController@create')->name('admin.distrito.create')
->middleware('permission:admin.distrito.create');

Route::put('admin/distrito/{role}','DistritoController@update')->name('admin.distrito.update')
->middleware('permission:admin.distrito.edit');

Route::get('admin/distrito/{role}','DistritoController@show')->name('admin.distrito.show')
->middleware('permission:admin.distrito.show');

Route::delete('admin/distrito/{role}','DistritoController@destroy')->name('admin.distrito.destroy')
->middleware('permission:admin.distrito.destroy');

Route::get('admin/distrito/{role}/edit','DistritoController@edit')->name('admin.distrito.edit')
->middleware('permission:admin.distrito.edit');
//Fin Distrito

//Documento

Route::post('admin/documento/store','DocumentoController@store')->name('admin.documento.store')
->middleware('permission:admin.documento.create');

Route::get('admin/documento','DocumentoController@index')->name('admin.documento.index')
->middleware('permission:admin.documento.index');

Route::get('admin/documento/create','DocumentoController@create')->name('admin.documento.create')
->middleware('permission:admin.documento.create');

Route::put('admin/documento/{role}','DocumentoController@update')->name('admin.documento.update')
->middleware('permission:admin.documento.edit');

Route::get('admin/documento/{role}','DocumentoController@show')->name('admin.documento.show')
->middleware('permission:admin.documento.show');

Route::delete('admin/documento/{role}','DocumentoController@destroy')->name('admin.documento.destroy')
->middleware('permission:admin.documento.destroy');

Route::get('admin/documento/{role}/edit','DocumentoController@edit')->name('admin.documento.edit')
->middleware('permission:admin.documento.edit');
//Fin Documento

//Entidad

Route::post('admin/entidad/store','EntidadController@store')->name('admin.entidad.store')
->middleware('permission:admin.entidad.create');

Route::get('admin/entidad','EntidadController@index')->name('admin.entidad.index')
->middleware('permission:admin.entidad.index');

Route::get('admin/entidad/create','EntidadController@create')->name('admin.entidad.create')
->middleware('permission:admin.entidad.create');

Route::put('admin/entidad/{role}','EntidadController@update')->name('admin.entidad.update')
->middleware('permission:admin.entidad.edit');

Route::get('admin/entidad/{role}','EntidadController@show')->name('admin.entidad.show')
->middleware('permission:admin.entidad.show');

Route::delete('admin/entidad/{role}','EntidadController@destroy')->name('admin.entidad.destroy')
->middleware('permission:admin.entidad.destroy');

Route::get('admin/entidad/{role}/edit','EntidadController@edit')->name('admin.entidad.edit')
->middleware('permission:admin.entidad.edit');
//Fin Entidad

//Estado

Route::post('admin/estado/store','EstadoController@store')->name('admin.estado.store')
->middleware('permission:admin.estado.create');

Route::get('admin/estado','EstadoController@index')->name('admin.estado.index')
->middleware('permission:admin.estado.index');

Route::get('admin/estado/create','EstadoController@create')->name('admin.estado.create')
->middleware('permission:admin.estado.create');

Route::put('admin/estado/{role}','EstadoController@update')->name('admin.estado.update')
->middleware('permission:admin.estado.edit');

Route::get('admin/estado/{role}','EstadoController@show')->name('admin.estado.show')
->middleware('permission:admin.estado.show');

Route::delete('admin/estado/{role}','EstadoController@destroy')->name('admin.estado.destroy')
->middleware('permission:admin.estado.destroy');

Route::get('admin/estado/{role}/edit','EstadoController@edit')->name('admin.estado.edit')
->middleware('permission:admin.estado.edit');
//Fin Estado


//Persona

Route::post('admin/persona/store','PersonaController@store')->name('admin.persona.store')
->middleware('permission:admin.persona.create');

Route::get('admin/persona','PersonaController@index')->name('admin.persona.index')
->middleware('permission:admin.persona.index');

Route::get('admin/persona/create','PersonaController@create')->name('admin.persona.create')
->middleware('permission:admin.persona.create');

Route::put('admin/persona/{role}','PersonaController@update')->name('admin.persona.update')
->middleware('permission:admin.persona.edit');

Route::get('admin/persona/{role}','PersonaController@show')->name('admin.persona.show')
->middleware('permission:admin.persona.show');

Route::delete('admin/persona/{role}','PersonaController@destroy')->name('admin.persona.destroy')
->middleware('permission:admin.persona.destroy');

Route::get('admin/persona/{role}/edit','PersonaController@edit')->name('admin.persona.edit')
->middleware('permission:admin.persona.edit');
//Fin Persona

//Provincia

Route::post('admin/provincia/store','ProvinciaController@store')->name('admin.provincia.store')
->middleware('permission:admin.provincia.create');

Route::get('admin/provincia','ProvinciaController@index')->name('admin.provincia.index')
->middleware('permission:admin.provincia.index');

Route::get('admin/provincia/create','ProvinciaController@create')->name('admin.provincia.create')
->middleware('permission:admin.provincia.create');

Route::put('admin/provincia/{role}','ProvinciaController@update')->name('admin.provincia.update')
->middleware('permission:admin.provincia.edit');

Route::get('admin/provincia/{role}','ProvinciaController@show')->name('admin.provincia.show')
->middleware('permission:admin.provincia.show');

Route::delete('admin/provincia/{role}','ProvinciaController@destroy')->name('admin.provincia.destroy')
->middleware('permission:admin.provincia.destroy');

Route::get('admin/provincia/{role}/edit','ProvinciaController@edit')->name('admin.provincia.edit')
->middleware('permission:admin.provincia.edit');
//Fin Provincia


//Proyecto

Route::post('admin/proyecto/store','ProyectoController@store')->name('admin.proyecto.store')
->middleware('permission:admin.proyecto.create');

Route::get('admin/proyecto','ProyectoController@index')->name('admin.proyecto.index')
->middleware('permission:admin.proyecto.index');

Route::get('admin/proyecto/create','ProyectoController@create')->name('admin.proyecto.create')
->middleware('permission:admin.proyecto.create');

Route::put('admin/proyecto/{role}','ProyectoController@update')->name('admin.proyecto.update')
->middleware('permission:admin.proyecto.edit');

Route::get('admin/proyecto/{role}','ProyectoController@show')->name('admin.proyecto.show')
->middleware('permission:admin.proyecto.show');

Route::delete('admin/proyecto/{role}','ProyectoController@destroy')->name('admin.proyecto.destroy')
->middleware('permission:admin.proyecto.destroy');

Route::get('admin/proyecto/{role}/edit','ProyectoController@edit')->name('admin.proyecto.edit')
->middleware('permission:admin.proyecto.edit');
//Fin Proyecto


//Representante

Route::post('admin/representante/store','RepresentanteController@store')->name('admin.representante.store')
->middleware('permission:admin.representante.create');

Route::get('admin/representante','RepresentanteController@index')->name('admin.representante.index')
->middleware('permission:admin.representante.index');

Route::get('admin/representante/create','RepresentanteController@create')->name('admin.representante.create')
->middleware('permission:admin.representante.create');

Route::put('admin/representante/{role}','RepresentanteController@update')->name('admin.representante.update')
->middleware('permission:admin.representante.edit');

Route::get('admin/representante/{role}','RepresentanteController@show')->name('admin.representante.show')
->middleware('permission:admin.representante.show');

Route::delete('admin/representante/{role}','RepresentanteController@destroy')->name('admin.representante.destroy')
->middleware('permission:admin.representante.destroy');

Route::get('admin/representante/{role}/edit','RepresentanteController@edit')->name('admin.representante.edit')
->middleware('permission:admin.representante.edit');
//Fin Representante

//Tipoestudio

Route::post('admin/tipoestudio/store','TipoestudioController@store')->name('admin.tipoestudio.store')
->middleware('permission:admin.tipoestudio.create');

Route::get('admin/tipoestudio','TipoestudioController@index')->name('admin.tipoestudio.index')
->middleware('permission:admin.tipoestudio.index');

Route::get('admin/tipoestudio/create','TipoestudioController@create')->name('admin.tipoestudio.create')
->middleware('permission:admin.tipoestudio.create');

Route::put('admin/tipoestudio/{role}','TipoestudioController@update')->name('admin.tipoestudio.update')
->middleware('permission:admin.tipoestudio.edit');

Route::get('admin/tipoestudio/{role}','TipoestudioController@show')->name('admin.tipoestudio.show')
->middleware('permission:admin.tipoestudio.show');

Route::delete('admin/tipoestudio/{role}','TipoestudioController@destroy')->name('admin.tipoestudio.destroy')
->middleware('permission:admin.tipoestudio.destroy');

Route::get('admin/tipoestudio/{role}/edit','TipoestudioController@edit')->name('admin.tipoestudio.edit')
->middleware('permission:admin.tipoestudio.edit');
//Fin Tipoestudio


//Tipoevaluacion

Route::post('admin/tipoevaluacion/store','TipoevaluacionController@store')->name('admin.tipoevaluacion.store')
->middleware('permission:admin.tipoevaluacion.create');

Route::get('admin/tipoevaluacion','TipoevaluacionController@index')->name('admin.tipoevaluacion.index')
->middleware('permission:admin.tipoevaluacion.index');

Route::get('admin/tipoevaluacion/create','TipoevaluacionController@create')->name('admin.tipoevaluacion.create')
->middleware('permission:admin.tipoevaluacion.create');

Route::put('admin/tipoevaluacion/{role}','TipoevaluacionController@update')->name('admin.tipoevaluacion.update')
->middleware('permission:admin.tipoevaluacion.edit');

Route::get('admin/tipoevaluacion/{role}','TipoevaluacionController@show')->name('admin.tipoevaluacion.show')
->middleware('permission:admin.tipoevaluacion.show');

Route::delete('admin/tipoevaluacion/{role}','TipoevaluacionController@destroy')->name('admin.tipoevaluacion.destroy')
->middleware('permission:admin.tipoevaluacion.destroy');

Route::get('admin/tipoevaluacion/{role}/edit','TipoevaluacionController@edit')->name('admin.tipoevaluacion.edit')
->middleware('permission:admin.tipoevaluacion.edit');
//Fin Tipoevaluacion


//FIN MANTENIMIENTO GENERAL
//
//MANTENIMIENTO DE USUARIOS
//Roles
Route::post('admin/roles/store','RoleController@store')->name('admin.roles.store')
->middleware('permission:admin.roles.create');

Route::get('admin/roles','RoleController@index')->name('admin.roles.index')
->middleware('permission:admin.roles.index');

Route::get('admin/roles/create','RoleController@create')->name('admin.roles.create')
->middleware('permission:admin.roles.create');

Route::put('admin/roles/{role}','RoleController@update')->name('admin.roles.update')
->middleware('permission:admin.roles.edit');

Route::get('admin/roles/{role}','RoleController@show')->name('admin.roles.show')
->middleware('permission:admin.roles.show');

Route::delete('admin/roles/{role}','RoleController@destroy')->name('admin.roles.destroy')
->middleware('permission:admin.roles.destroy');

Route::get('admin/roles/{role}/edit','RoleController@edit')->name('admin.roles.edit')
->middleware('permission:admin.roles.edit');
//Fin roles

//Usuarios
Route::post('admin/user/store','UserController@store')->name('admin.user.store')
->middleware('permission:admin.user.create');

Route::get('admin/user','UserController@index')->name('admin.user.index')
->middleware('permission:admin.user.index');

Route::get('admin/user/create','UserController@create')->name('admin.user.create')
->middleware('permission:admin.user.create');

Route::put('admin/user/{role}','UserController@update')->name('admin.user.update')
->middleware('permission:admin.users.edit');

Route::get('admin/user/{role}','UserController@show')->name('admin.user.show')
->middleware('permission:admin.user.show');

Route::delete('admin/user/{role}','UserController@destroy')->name('admin.user.destroy')
->middleware('permission:admin.user.destroy');

Route::get('admin/user/{role}/edit','UserController@edit')->name('admin.user.edit')
->middleware('permission:admin.user.edit');
//FinUsuarios
//
//
//DETALLE USUARIOS

Route::get('admin/detalleusuario','DetalleusuarioController@index')->name('admin.detalleusuario.index')
->middleware('permission:admin.detalleusuario.index');

Route::put('admin/detalleusuario/{id}','DetalleusuarioController@update')->name('admin.detalleusuario.update')
->middleware('permission:admin.detalleusuarios.edit');

Route::get('admin/detalleusuario/{id}','DetalleusuarioController@show')->name('admin.detalleusuario.show')
->middleware('permission:admin.detalleusuario.show');

Route::get('admin/detalleusuario/{id}/edit','DetalleusuarioController@edit')->name('admin.detalleusuario.edit')
->middleware('permission:admin.detalleusuario.edit');

//FIN DETALLE USUARIOS
//FIN MANTENIMIENTO DE USUARIOS



//REGISTRO PROYECTO

//Registro

Route::post('admin/registro/store','RegistroController@store')->name('admin.registro.store')
->middleware('permission:admin.registro.create');

Route::get('admin/registro','RegistroController@index')->name('admin.registro.index')
->middleware('permission:admin.registro.index');

Route::get('admin/registro/create','RegistroController@create')->name('admin.registro.create')
->middleware('permission:admin.registro.create');

Route::put('admin/registro/{role}','RegistroController@update')->name('admin.registro.update')
->middleware('permission:admin.registro.edit');

Route::get('admin/registrodetalle/{role}/','RegistroController@show')->name('admin.registro.show')
->middleware('permission:admin.registro.show');

Route::delete('admin/registro/{role}','RegistroController@destroy')->name('admin.registro.destroy')
->middleware('permission:admin.registro.destroy');

Route::post('admin/registro/edit','RegistroController@edit')->name('admin.registro.edit')
->middleware('permission:admin.registro.edit');


//RegistroDetalle ELIMINAR

Route::delete('admin/registrodel/{role}','RegistrodetalleController@destroy')->name('admin.registrodetalle.destroy')
->middleware('permission:admin.registrodetalle.destroy');

Route::delete('admin/registrodoc/{role}','RegistrodetalleController@edit')->name('admin.registrodetalle.edit')
->middleware('permission:admin.registrodetalle.edit');

//Fin Registro
//Proyectoregistro

Route::post('admin/proyectoregistro/store','ProyectoregistroController@store')->name('admin.proyectoregistro.store')
->middleware('permission:admin.proyectoregistro.create');

Route::get('admin/proyectoregistro','ProyectoregistroController@index')->name('admin.proyectoregistro.index')
->middleware('permission:admin.proyectoregistro.index');

Route::get('admin/proyectoregistro/create','ProyectoregistroController@create')->name('admin.proyectoregistro.create')
->middleware('permission:admin.proyectoregistro.create');

Route::put('admin/proyectoregistro/{role}','ProyectoregistroController@update')->name('admin.proyectoregistro.update')
->middleware('permission:admin.proyectoregistro.edit');

Route::get('admin/proyectoregistro/{role}','ProyectoregistroController@show')->name('admin.proyectoregistro.show')
->middleware('permission:admin.proyectoregistro.show');

Route::delete('admin/proyectoregistro/{role}','ProyectoregistroController@destroy')->name('admin.proyectoregistro.destroy')
->middleware('permission:admin.proyectoregistro.destroy');

Route::get('admin/proyectoregistro/{role}/edit','ProyectoregistroController@edit')->name('admin.proyectoregistro.edit')
->middleware('permission:admin.proyectoregistro.edit');
//Fin Proyectoregistro

//FIN REGISTRO PROYECTO

//GESTION PROYECTOS
//Evaluacionestudio

Route::post('admin/evaluacionestudio/store','EvaluacionestudioController@store')->name('admin.evaluacionestudio.store')
->middleware('permission:admin.evaluacionestudio.create');

Route::get('admin/evaluacionestudio','EvaluacionestudioController@index')->name('admin.evaluacionestudio.index')
->middleware('permission:admin.evaluacionestudio.index');

Route::get('admin/evaluacionestudio/create','EvaluacionestudioController@create')->name('admin.evaluacionestudio.create')
->middleware('permission:admin.evaluacionestudio.create');

Route::put('admin/evaluacionestudio/{role}','EvaluacionestudioController@update')->name('admin.evaluacionestudio.update')
->middleware('permission:admin.evaluacionestudio.edit');

Route::get('admin/evaluacionestudio/{role}','EvaluacionestudioController@show')->name('admin.evaluacionestudio.show')
->middleware('permission:admin.evaluacionestudio.show');

Route::delete('admin/evaluacionestudio/{role}','EvaluacionestudioController@destroy')->name('admin.evaluacionestudio.destroy')
->middleware('permission:admin.evaluacionestudio.destroy');

Route::get('admin/evaluacionestudio/{role}/edit','EvaluacionestudioController@edit')->name('admin.evaluacionestudio.edit')
->middleware('permission:admin.evaluacionestudio.edit');
//Fin Evaluacionestudio
//
//Certificacionestudio

Route::post('admin/certificacionestudio/store','CertificacionestudioController@store')->name('admin.certificacionestudio.store')
->middleware('permission:admin.certificacionestudio.create');

Route::get('admin/certificacionestudio','CertificacionestudioController@index')->name('admin.certificacionestudio.index')
->middleware('permission:admin.certificacionestudio.index');

Route::get('admin/certificacionestudio/create','CertificacionestudioController@create')->name('admin.certificacionestudio.create')
->middleware('permission:admin.certificacionestudio.create');

Route::put('admin/certificacionestudio/{role}','CertificacionestudioController@update')->name('admin.certificacionestudio.update')
->middleware('permission:admin.certificacionestudio.edit');

Route::get('admin/certificacionestudio/{role}','CertificacionestudioController@show')->name('admin.certificacionestudio.show')
->middleware('permission:admin.certificacionestudio.show');

Route::delete('admin/certificacionestudio/{role}','CertificacionestudioController@destroy')->name('admin.certificacionestudio.destroy')
->middleware('permission:admin.certificacionestudio.destroy');

Route::get('admin/certificacionestudio/{role}/edit','CertificacionestudioController@edit')->name('admin.certificacionestudio.edit')
->middleware('permission:admin.certificacionestudio.edit');
//Fin Certificacionestudio
//Responsableproyecto

Route::post('admin/responsableproyecto/store','ResponsableproyectoController@store')->name('admin.responsableproyecto.store')
->middleware('permission:admin.responsableproyecto.create');

Route::get('admin/responsableproyecto','ResponsableproyectoController@index')->name('admin.responsableproyecto.index')
->middleware('permission:admin.responsableproyecto.index');

Route::get('admin/responsableproyecto/create','ResponsableproyectoController@create')->name('admin.responsableproyecto.create')
->middleware('permission:admin.responsableproyecto.create');

Route::put('admin/responsableproyecto/{role}','ResponsableproyectoController@update')->name('admin.responsableproyecto.update')
->middleware('permission:admin.responsableproyecto.edit');

Route::get('admin/responsableproyecto/{role}','ResponsableproyectoController@show')->name('admin.responsableproyecto.show')
->middleware('permission:admin.responsableproyecto.show');

Route::delete('admin/responsableproyecto/{role}','ResponsableproyectoController@destroy')->name('admin.responsableproyecto.destroy')
->middleware('permission:admin.responsableproyecto.destroy');

Route::get('admin/responsableproyecto/{role}/edit','ResponsableproyectoController@edit')->name('admin.responsableproyecto.edit')
->middleware('permission:admin.responsableproyecto.edit');
//Fin Responsableproyecto
//END GESTION PROYECTOS
//EVALUACION PROYECTPS
//Certificacion

Route::post('admin/certificacion/store','CertificacionController@store')->name('admin.certificacion.store')
->middleware('permission:admin.certificacion.create');

Route::get('admin/certificacion','CertificacionController@index')->name('admin.certificacion.index')
->middleware('permission:admin.certificacion.index');

Route::get('admin/certificacion/create','CertificacionController@create')->name('admin.certificacion.create')
->middleware('permission:admin.certificacion.create');

Route::put('admin/certificacion/{role}','CertificacionController@update')->name('admin.certificacion.update')
->middleware('permission:admin.certificacion.edit');

Route::get('admin/certificacion/{role}','CertificacionController@show')->name('admin.certificacion.show')
->middleware('permission:admin.certificacion.show');

Route::delete('admin/certificacion/{role}','CertificacionController@destroy')->name('admin.certificacion.destroy')
->middleware('permission:admin.certificacion.destroy');

Route::get('admin/certificacion/{role}/edit','CertificacionController@edit')->name('admin.certificacion.edit')
->middleware('permission:admin.certificacion.edit');
//Fin Certificacion
//Resolucion

Route::post('admin/resolucion/store','ResolucionController@store')->name('admin.resolucion.store')
->middleware('permission:admin.resolucion.create');

Route::get('admin/resolucion','ResolucionController@index')->name('admin.resolucion.index')
->middleware('permission:admin.resolucion.index');

Route::get('admin/resolucion/create','ResolucionController@create')->name('admin.resolucion.create')
->middleware('permission:admin.resolucion.create');

Route::put('admin/resolucion/{role}','ResolucionController@update')->name('admin.resolucion.update')
->middleware('permission:admin.resolucion.edit');

Route::get('admin/resolucion/{role}','ResolucionController@show')->name('admin.resolucion.show')
->middleware('permission:admin.resolucion.show');

Route::delete('admin/resolucion/{role}','ResolucionController@destroy')->name('admin.resolucion.destroy')
->middleware('permission:admin.resolucion.destroy');

Route::get('admin/resolucion/{role}/edit','ResolucionController@edit')->name('admin.resolucion.edit')
->middleware('permission:admin.resolucion.edit');
//Fin Certificacion
//SEGUIMIENTO

//Seguimiento

Route::post('admin/seguimiento/store','SeguimientoController@store')->name('admin.seguimiento.store')
->middleware('permission:admin.seguimiento.create');

Route::get('admin/seguimiento','SeguimientoController@index')->name('admin.seguimiento.index')
->middleware('permission:admin.seguimiento.index');

Route::get('admin/seguimiento/create','SeguimientoController@create')->name('admin.seguimiento.create')
->middleware('permission:admin.seguimiento.create');

Route::put('admin/seguimiento/{role}','SeguimientoController@update')->name('admin.seguimiento.update')
->middleware('permission:admin.seguimiento.edit');

Route::get('admin/seguimiento/{role}','SeguimientoController@show')->name('admin.seguimiento.show')
->middleware('permission:admin.seguimiento.show');

Route::delete('admin/seguimiento/{role}','SeguimientoController@destroy')->name('admin.seguimiento.destroy')
->middleware('permission:admin.seguimiento.destroy');

Route::get('admin/seguimiento/{role}/edit','SeguimientoController@edit')->name('admin.seguimiento.edit')
->middleware('permission:admin.seguimiento.edit');
//Fin Seguimiento

//FIN SEGUIMIENTO
//Evaluacionestudio

Route::post('admin/evaluacion/store','EvaluacionController@store')->name('admin.evaluacion.store')
->middleware('permission:admin.evaluacion.create');

Route::get('admin/evaluacion','EvaluacionController@index')->name('admin.evaluacion.index')
->middleware('permission:admin.evaluacion.index');

Route::get('admin/evaluacion/create','EvaluacionController@create')->name('admin.evaluacion.create')
->middleware('permission:admin.evaluacion.create');

Route::put('admin/evaluacion/{role}','EvaluacionController@update')->name('admin.evaluacion.update')
->middleware('permission:admin.evaluacion.edit');

Route::get('admin/evaluacion/{role}','EvaluacionController@show')->name('admin.evaluacion.show')
->middleware('permission:admin.evaluacion.show');

Route::delete('admin/evaluacion/{role}','EvaluacionController@destroy')->name('admin.evaluacion.destroy')
->middleware('permission:admin.evaluacion.destroy');

Route::get('admin/evaluacion/{role}/edit','EvaluacionController@edit')->name('admin.evaluacion.edit')
->middleware('permission:admin.evaluacion.edit');


//Fin Evaluacionestudio

//ObservacionEvaluacionestudio

Route::post('admin/observacionevaluacion/store','ObservacionevaluacionController@store')->name('admin.observacionevaluacion.store')
->middleware('permission:admin.observacionevaluacion.create');

Route::post('admin/observacionevaluacion','ObservacionevaluacionController@index')->name('admin.observacionevaluacion.index')
->middleware('permission:admin.observacionevaluacion.index');

Route::get('admin/observacionevaluacion/create','ObservacionevaluacionController@create')->name('admin.observacionevaluacion.create')
->middleware('permission:admin.observacionevaluacion.create');

Route::put('admin/observacionevaluacion/{role}','ObservacionevaluacionController@update')->name('admin.observacionevaluacion.update')
->middleware('permission:admin.observacionevaluacion.edit');

Route::get('admin/observacionevaluacion/{role}','ObservacionevaluacionController@show')->name('admin.observacionevaluacion.show')
->middleware('permission:admin.observacionevaluacion.show');

Route::delete('admin/observacionevaluacion/{role}','ObservacionevaluacionController@destroy')->name('admin.observacionevaluacion.destroy')
->middleware('permission:admin.observacionevaluacion.destroy');

Route::get('admin/observacionevaluacion/{role}','ObservacionevaluacionController@edit')->name('admin.observacionevaluacion.edit')
->middleware('permission:admin.observacionevaluacion.edit');




//Fin ObservacionEvaluacionestudio

//opnion tecnica

Route::post('admin/opiniontecnica/store','OpiniontecnicaController@store')->name('admin.opiniontecnica.store')
->middleware('permission:admin.opiniontecnica.create');

Route::post('admin/opiniontecnica','OpiniontecnicaController@index')->name('admin.opiniontecnica.index')
->middleware('permission:admin.opiniontecnica.index');

Route::get('admin/opiniontecnica/create','OpiniontecnicaController@create')->name('admin.opiniontecnica.create')
->middleware('permission:admin.opiniontecnica.create');

Route::put('admin/opiniontecnica/{role}','OpiniontecnicaController@update')->name('admin.opiniontecnica.update')
->middleware('permission:admin.opiniontecnica.edit');

Route::get('admin/opiniontecnica/{role}','OpiniontecnicaController@show')->name('admin.opiniontecnica.show')
->middleware('permission:admin.opiniontecnica.show');

Route::delete('admin/opiniontecnica/{role}','OpiniontecnicaController@destroy')->name('admin.opiniontecnica.destroy')
->middleware('permission:admin.opiniontecnica.destroy');

Route::get('admin/opiniontecnica/{role}','OpiniontecnicaController@edit')->name('admin.opiniontecnica.edit')
->middleware('permission:admin.opiniontecnica.edit');




//Fin opinion tecnica

//RespuestaEvaluacionestudio

Route::post('admin/respuestaevaluacion/store','RespuestaevaluacionController@store')->name('admin.respuestaevaluacion.store')
->middleware('permission:admin.respuestaevaluacion.create');

Route::post('admin/respuestaevaluacion','RespuestaevaluacionController@index')->name('admin.respuestaevaluacion.index')
->middleware('permission:admin.respuestaevaluacion.index');

Route::get('admin/respuestaevaluacion/create','RespuestaevaluacionController@create')->name('admin.respuestaevaluacion.create')
->middleware('permission:admin.respuestaevaluacion.create');

Route::put('admin/respuestaevaluacion/{role}','RespuestaevaluacionController@update')->name('admin.respuestaevaluacion.update')
->middleware('permission:admin.respuestaevaluacion.edit');

Route::get('admin/respuestaevaluacion/{role}','RespuestaevaluacionController@show')->name('admin.respuestaevaluacion.show')
->middleware('permission:admin.respuestaevaluacion.show');

Route::delete('admin/respuestaevaluacion/{role}','RespuestaevaluacionController@destroy')->name('admin.respuestaevaluacion.destroy')
->middleware('permission:admin.respuestaevaluacion.destroy');

Route::get('admin/respuestaevaluacion/{role}/edit','RespuestaevaluacionController@edit')->name('admin.respuestaevaluacion.edit')
->middleware('permission:admin.respuestaevaluacion.edit');


//Fin RespuestaEvaluacionestudio



//ProyectoUSER

Route::post('admin/proyectouser/store','ProyectouserController@store')->name('admin.proyectouser.store')
->middleware('permission:admin.proyectouser.create');

Route::get('admin/proyectouser','ProyectouserController@index')->name('admin.proyectouser.index')
->middleware('permission:admin.proyectouser.index');

Route::get('admin/proyectouser/create','ProyectouserController@create')->name('admin.proyectouser.create')
->middleware('permission:admin.proyectouser.create');

Route::put('admin/proyectouser/{role}','ProyectouserController@update')->name('admin.proyectouser.update')
->middleware('permission:admin.proyectouser.edit');

Route::get('admin/proyectouser/{role}','ProyectouserController@show')->name('admin.proyectouser.show')
->middleware('permission:admin.proyectouser.show');

Route::delete('admin/proyectouser/{role}','ProyectouserController@destroy')->name('admin.proyectouser.destroy')
->middleware('permission:admin.proyectouser.destroy');

Route::get('admin/proyectouser/{role}/edit','ProyectouserController@edit')->name('admin.proyectouser.edit')
->middleware('permission:admin.proyectouser.edit');
//Fin ProyectouserUSER

//SolicitudUSER

Route::get('admin/solicituduser','SolicituduserController@index')->name('admin.solicituduser.index')
->middleware('permission:admin.solicituduser.index');
//Fin SolicitudUSER

//SeguimientoUSER

Route::get('admin/seguimientouser','SeguimientouserController@index')->name('admin.seguimientouser.index')
->middleware('permission:admin.seguimientouser.index');
//Fin SeguimientoUSER




//FIN EVALUACION PROYECTO





//Fin Middleware
//routes admin
//Route::resource('admin/proyecto','ProyectoController');
/*Route::resource('admin/actividad','ActividadController');*/
//Route::resource('admin/entidad','EntidadController');
//Route::resource('admin/persona','PersonaController');
//Route::resource('admin/departamento','DepartamentoController');
//Route::resource('admin/provincia','ProvinciaController');
//Route::resource('admin/distrito','DistritoController');
//Route::resource('admin/documento','DocumentoController');

//Route::resource('admin/seguimiento','SeguimientoController');
//Route::resource('admin/evaluacion','EvaluacionController');
//Route::resource('admin/cargo','CargoController');
//Route::resource('admin/tipoevaluacion','TipoevaluacionController');
//Route::resource('admin/tipoestudio','TipoestudioController');
//Route::resource('admin/estado','EstadoController');
//Route::resource('admin/evaluacionestudio','EvaluacionestudioController');
//Route::resource('admin/certificacion','CertificacionController');
//Route::resource('admin/representante','RepresentanteController');



// ROUTE ALERTA ADMINISTRADOR
Route::post('admin/mensaje','AdminController@mensaje')->name('admin.mensaje');
Route::post('admin/alerta','AdminController@alerta')->name('admin.alerta');
Route::post('admin/porcentaje','AdminController@porcentaje')->name('admin.porcentaje');
//FIN ROUTE ALERTA ADMINISTRADOR

Route::post('admin/proyecto/listar','ProyectoController@listar')->name('admin.proyecto.listar');
Route::post('admin/proyectouser/listar','ProyectouserController@listar')->name('admin.proyectouser.listar');
Route::post('admin/seguimientouser/historial','SeguimientouserController@historial')->name('admin.seguimientouser.historial');

//Route Seguimiento
Route::put('admin/seguimiento/{role}','SeguimientoController@update1')->name('admin.seguimiento.update1');
Route::post('admin/seguimiento/listar','SeguimientoController@listar')->name('admin.seguimiento.listar');
Route::post('admin/seguimiento/listarall','SeguimientoController@listarall')->name('admin.seguimiento.listarall');
Route::post('admin/seguimiento/mostrardocumento','SeguimientoController@mostrardocumento')->name('admin.seguimiento.mostrardocumento');
Route::post('admin/seguimiento/mostrarrespuesta','SeguimientoController@mostrarrespuesta')->name('admin.seguimiento.mostrarrespuesta');

//Route::post('admin/representante/{id}/edit','RepresentanteController@edit')->name('admin.representante.edit');

//routes evaluacion
Route::post('admin/evaluacionestudio/asignar','EvaluacionestudioController@asignar')->name('admin.evaluacionestudio.asignar');
Route::post('admin/evaluacion/listar','EvaluacionController@listar')->name('admin.evaluacion.listar');
Route::post('admin/evaluacion/listarall','EvaluacionController@listarall')->name('admin.evaluacion.listarall');
Route::post('admin/evaluacion/mostrardocumento','EvaluacionController@mostrardocumento')->name('admin.evaluacion.mostrardocumento');
Route::post('admin/evaluacion/mostrarrespuesta','EvaluacionController@mostrarrespuesta')->name('admin.evaluacion.mostrarrespuesta');

//routes registro
//Route::resource('admin/registro','RegistroController');
Route::post('admin/registro/listardelimitacion','RegistroController@listardelimitacion')->name('admin.registro.listardelimitacion');
Route::post('admin/registro/listardocumento','RegistroController@listardocumento')->name('admin.registro.listardocumento');
//fin routes
}); //FIN MIDDLEWARE AUTH
//routes web
/*Route::get('/admin',function(){
    return view('admin.index');
});*/


Route::get('/certificacionambiental', function () {
    return view('CertificacionAmbiental');
});

Route::get('/ResultadosEvaluacionAmbiental', function () {
    return view('ResultadosEvaluacionAmbiental');
});

Route::get('/pautasorientacion', function () {
    return view('PautasOrientacion');
});
Route::get('/tupa', function () {
    return view('Tupa');
});
Route::get('/Mapro', function () {
    return view('Mapro');
});
Route::get('/ventanillaunica', function () {
    return view('VentanillaUnica');
});
Route::get('/RecursosNat', function () {
    return view('RecursosNat');

});
Route::get('/DRAgricultura', function () {
    return view('DRAgricultura');
});
Route::get('/DREducacion', function () {
    return view('DREducacion');
});
Route::get('/DRSalud', function () {
    return view('DRSalud');
});
Route::get('/DRMinas', function () {
    return view('DRMinas');
});
Route::get('/DRProduccion', function () {
    return view('DRProduccion');
});
Route::get('/DRTurismo', function () {
    return view('DRTurismo');
});
Route::get('/DRVivienda', function () {
    return view('DRVivienda');
});
Route::get('/DRTransporte', function () {
    return view('DRTransporte');

});
Route::get('/ubicacion', function () {
    return view('ubicacion');

});

//fin routes
//
//
/*Route::get('/prueba',function(){
    return view('home');

});
*/











