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
Route::get('/welcome', function () {
    return view('welcome');
});
//routes admin
Route::resource('admin/proyecto','ProyectoController');
Route::resource('admin/catalogo','CatalogoController');
Route::resource('admin/actividad','ActividadController');
Route::resource('admin/entidad','EntidadController');
Route::resource('admin/persona','PersonaController');
Route::resource('admin/departamento','DepartamentoController');
Route::resource('admin/provincia','ProvinciaController');
Route::resource('admin/distrito','DistritoController');
Route::resource('admin/instrumento','InstrumentoController');
Route::resource('admin/documento','DocumentoController');

Route::resource('admin/seguimiento','SeguimientoController');
Route::resource('admin/evaluacion','EvaluacionController');
Route::resource('admin/cargo','CargoController');
Route::resource('admin/tipoevaluacion','TipoevaluacionController');
Route::resource('admin/tipoestudio','TipoestudioController');
Route::resource('admin/estado','EstadoController');
Route::resource('admin/evaluacionestudio','EvaluacionestudioController');
Route::resource('admin/certificacion','CertificacionController');


Route::post('admin/proyecto/listar','ProyectoController@listar')->name('admin.proyecto.listar');
Route::post('admin/seguimiento/listar','SeguimientoController@listar')->name('admin.seguimiento.listar');


//routes evaluacion
Route::post('admin/evaluacionestudio/asignar','EvaluacionestudioController@asignar')->name('admin.evaluacionestudio.asignar');
Route::post('admin/evaluacion/listar','EvaluacionController@listar')->name('admin.evaluacion.listar');
Route::post('admin/evaluacion/listarall','EvaluacionController@listarall')->name('admin.evaluacion.listarall');

//routes registro
Route::resource('admin/registro','RegistroController');
Route::post('admin/registro/listardelimitacion','RegistroController@listardelimitacion')->name('admin.registro.listardelimitacion');
Route::post('admin/registro/agregardelimitacion','RegistroController@agregardelimitacion')->name('admin.registro.agregardelimitacion');
Route::post('admin/registro/listardocumento','RegistroController@listardocumento')->name('admin.registro.listardocumento');
Route::post('admin/registro/agregardocumento','RegistroController@agregardocumento')->name('admin.registro.agregardocumento');
//fin routes

//routes web
Route::get('/admin',function(){
    return view('admin.index');
});
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
Route::get('/prueba',function(){
    return view('home');

});
Route::get('/prueba1',function(){
    return view('prueba1');

});



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Route::post('/update/{idcatalogo}', 'CatalogoControllerr@update')->name('admin.catalogo.update');