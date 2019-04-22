<?php
use App\Agremiado;
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
Route::get('/test',function(){
$agremiados=Agremiado::has('personas')->get();

foreach ($agremiados as $persona) {
    echo $persona->nombre;
}

});

Route::get('/dashboard','DashboardController@index')->name('app.dashboard');

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');


Route::prefix('admin')->group(function(){

	Route::resource('users','UsersController');

});


Route::get('/encript',function(){
	return bcrypt('12345678');
});



/*
* RUTAS DE ARCHIVOS
*
*/


Route::resource('/agremiado','AgremiadoController');
Route::resource('/especialidad','EspecialidadController');
Route::resource('/universidad','UniversidadController');
Route::resource('/instituto','InstitutoController');
Route::resource('/tarifa','TarifaController');
Route::resource('/proyecto','ProyectoController');
Route::resource('/tproyecto','TipoProyectoController');
Route::resource('/baremo','InstrumentoController');
Route::resource('/parentesco','ParentescoController');
Route::resource('/pago','PagoController');
Route::resource('/tpago','TipoPagoController');
Route::resource('/cfamiliar','CargaFamiliarController');
Route::resource('/configuracion','ConfiguracionController');
Route::resource('/funcion','FuncionController');
Route::resource('/perfil','PerfilController');
Route::resource('/usuario','UsuarioController');



/*
* RUTAS DE PROCESOS
*
*/
Route::resource('/solvencia','SolvenciaController');
Route::resource('/plano','PlanoController');
Route::resource('/cepir','CepirController');
Route::resource('/auditoria','AuditoriaController');
Route::resource('/visado','VisadoController');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// EXPORTA EXCEL
Route::get('descargar','ExcelController@descargarPlantilla')
    ->name('app.excel.download');

// SUBIR LOGO
 Route::post('configuracion/logo','ConfiguracionController@subirLogo')->name('logo');