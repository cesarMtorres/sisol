<?php
use App\Agremiado;


Route::get('/test',function(){
$agremiados=Agremiado::has('personas')->get();

foreach ($agremiados as $persona) {
    echo $persona->nombre;
}

});

/*
* INICIO DE SESION
*
*/
Route::get('/dashboard','DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('/', 'Auth\LoginController@showLoginForm')->name('loginform')->middleware('guest');
Route::post('loginsubmit','Auth\LoginController@login')->name('loginsubmit');
Route::get('logout','Auth\LoginController@logout');


Route::prefix('admin')->group(function(){

	Route::resource('agremiado','AgremiadoController');
	Route::resource('/especialidad','EspecialidadController');
	Route::resource('/universidad','UniversidadController');
	Route::resource('/instituto','InstitutoController');
	Route::resource('/tarifa','TarifaController');
	Route::resource('/proyecto','ProyectoController');
	Route::resource('/tproyecto','TipoProyectoController');
	Route::resource('/baremo','InstrumentoController');
	Route::resource('/baremoc','BaremosCController');
	Route::resource('/parentesco','ParentescoController');
	Route::resource('/pago','PagoController');
	Route::resource('/tpago','TipoPagoController');
	Route::resource('/cfamiliar','CargaFamiliarController');
	Route::resource('/configuracion','ConfiguracionController');
	Route::resource('/funcion','FuncionController');
	Route::resource('/perfil','PerfilController');
	Route::resource('/usuario','UsuarioController');
	Route::resource('/solvencia','SolvenciaController');
	Route::resource('/solvenciat','SolvenciatController');
	Route::resource('/plano','PlanoController');
	Route::resource('/cepir','CepirController');
	Route::resource('/auditoria','AuditoriaController');
	Route::resource('/visado','VisadoController');
});


Route::get('/encript',function(){
	return bcrypt('12345678');
});



/*
* RUTAS DE ARCHIVOS
*
*/


/*Route::resource('/agremiado','AgremiadoController');
Route::resource('/especialidad','EspecialidadController');
Route::resource('/universidad','UniversidadController');
Route::resource('/instituto','InstitutoController');
Route::resource('/tarifa','TarifaController');
Route::resource('/proyecto','ProyectoController');
Route::resource('/tproyecto','TipoProyectoController');
Route::resource('/baremo','InstrumentoController');
Route::resource('/baremoc','BaremosCController');
Route::resource('/parentesco','ParentescoController');
Route::resource('/pago','PagoController');
Route::resource('/tpago','TipoPagoController');
Route::resource('/cfamiliar','CargaFamiliarController');
Route::resource('/configuracion','ConfiguracionController');
Route::resource('/funcion','FuncionController');
Route::resource('/perfil','PerfilController');
Route::resource('/usuario','UsuarioController');
*/


/*
* RUTAS DE PROCESOS
*
*
Route::resource('/solvencia','SolvenciaController');
Route::resource('/solvenciat','SolvenciatController');
Route::resource('/plano','PlanoController');
Route::resource('/cepir','CepirController');
Route::resource('/auditoria','AuditoriaController');
Route::resource('/visado','VisadoController');

*/





Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


// EXPORTA EXCEL
Route::get('descargar','ExcelController@descargarPlantilla')
    ->name('app.excel.download');

// SUBIR LOGO
 Route::post('configuracion/logo','ConfiguracionController@subirLogo')->name('logo');


// DESCARGAR PDF

 Route::get('generate-pdf','HomeController2@generatePDF');

 Route::get('/dynamic_pdf', 'DynamicPDFController@index');
 

Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');