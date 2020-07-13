<?php
Route::get('/reporte', 'ReporteSolicitudController@reporte');

Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest');

Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('solicitante', 'SolicitanteController', ['except' => [
    'destroy', 'create',
]]);

Route::resource('solicitud', 'SolicitudController', ['except' => [
    'destroy', 'create', 'edit',
]]);



// PARAMETROS

Route::resource('proponente', 'ProponenteController', ['except' => [
    'destroy', 'show', 'create', 'edit',
]]);

Route::resource('indicadores', 'IndicadorController', ['except' => [
    'destroy', 'show', 'create', 'edit',
]]);

Route::resource('lineas', 'Lineacontroller', ['except' => [
    'destroy', 'show', 'create', 'edit',
]]);

Route::resource('tipopoblacion', 'TipoPoblacionController', ['except' => [
    'destroy', 'show', 'create', 'edit',
]]);

Route::resource('poblacion', 'PoblacionController', ['except' => [
    'destroy', 'show', 'create', 'edit',
]]);

Route::resource('documentos', 'DocumentoController', ['except' => [
    'destroy', 'show', 'create', 'edit',
]]);
Route::resource('ejes', 'EjeController', ['except' => [
    'destroy', 'show', 'create', 'edit',
]]);

Route::resource('dependencia', 'DependenciaController', ['except' => [
    'destroy', 'show', 'create', 'edit',
]]);

Route::resource('empleados', 'EmpleadoController', ['except' => [
    'destroy', 'create', 'edit',
]]);

Route::resource('fuente_verificacion', 'FuenteVerificacionController', ['except' => [
    'destroy', 'create', 'edit',
]]);
//RUTAS DE LAS DEPENdenciaS
Route::resource('management', 'ManagementController', ['only' => [
    'index', 'show',
]]);
Route::resource('juridica', 'JuridicaController', ['only' => [
    'index', 'show',
]]);
Route::resource('asistente', 'AsistenteAdministrativoController', ['only' => [
    'index', 'show',
]]);
Route::resource('proyectos', 'ProyectosController', ['only' => [
    'index', 'show',
]]);

// REPORTES
Route::get('reporte/comprobante/{id}', 'ReporteProyectoController@comprobante')->name('reporte.comprobante');
Route::get('reporte/proyectos', 'ReporteProyectoController@proyectos')->name('reporte.proyectos');
Route::post('reporte/proyectos/rango', 'ReporteProyectoController@filter')->name('reporte.filter');


Route::resource('reportesolicitud', 'ReporteSolicitudController', ['except' => [
    'destroy', 'create', 'edit',
]]);
Route::resource('reporteproyecto', 'ReporteProyectoController', ['except' => [
    'destroy', 'create', 'edit',
]]);
Route::resource('informacionreporte', 'InformacionReporteController', ['except' => [
    'destroy', 'create', 'edit',
]]);

Route::resource('indicador-meta', 'IndicadorMetaController', ['except' => [
    'destroy'
]]);

Route::resource('comprobantes', 'ComprobanteController');
Route::resource('anexos', 'AnexoController');

Route::resource('roles', 'RoleController');
Route::resource('permisos', 'PermisoController');
Route::put('users/perfil/{id}', 'EmpleadoController@updatePerfil')->name('update.perfil');



//SELECT
Route::get('obtener-solicitudes', 'AnexoController@solicitudes');
Route::get('director', 'DirectorAdministrativoController@index')->name('director.index');
Route::get('ver/solicitud/{id}', 'DirectorAdministrativoController@show')->name('director.show');
Route::get('ver/{id}', 'AdminController@edit')->name('admin.edit');
Route::get('solicitudes-generales', 'AdminController@index')->name('admin.index');
Route::get('comprobante/solicitud/{id}', 'ComprobanteController@createComprobante')->name('solicitud.comprobante');


// ESTADOS
Route::get('tipopoblacion/estado/{id}', 'TipoPoblacionController@changeStatus')->name('tipopoblacion.status');
Route::get('indicador/estado/{id}', 'IndicadorController@changeStatus')->name('indicador.status');
Route::get('lineas/estado/{id}', 'LineaController@changeLineas')->name('lineas.status');
Route::get('empleados/estado/{id}', 'EmpleadoController@changeBoss')->name('empleados.status');
Route::get('archivo', 'SolicitudController@archivo')->name('archivo.index');

// SOLICITUDES VARIADAS
Route::get('change/municipalities/{id}', 'MunicipioController@changeMunicipalities');
//Route::post('validate/documento', 'SolicitudController@validateDocumento')->name('validate.documento');

// MOVIMIENTO DE SOLICITUDES
Route::get('solicitud/sendmanagement/{id}', 'SolicitudController@sendManagement')->name('solicitud.management');
//ruta de viaje es decir, de asistente a juridica
Route::get('solicitud/enviarasistente/{id}', 'SolicitudController@enviarAsistente')->name('solicitud.asistente');
Route::get('solicitud/enviarjuridica/{id}', 'SolicitudController@enviarJuridica')->name('solicitud.juridica');
Route::get('solicitud/proyectos/{id}', 'SolicitudController@enviarProyectos')->name('solicitud.proyectos');
Route::get('solicitud/recepcion/{id}', 'SolicitudController@enviarRecepcion')->name('solicitud.recepcion');
Route::get('solicitud/director/{id}', 'SolicitudController@enviarDirector')->name('solicitud.director');
Route::get('solicitud/archivo/{id}', 'SolicitudController@enviarArchivo')->name('solicitud.archivo');

Route::post('reporte/linea', 'ReporteProyectoController@linea')->name('reporte.linea');
Route::post('reporte/fechas', 'ReporteProyectoController@fechas')->name('reporte.fechas');
Route::post('reporte/fechas/indicador', 'ReporteProyectoController@fechasIndicador')->name('reporte.fechas-indicador');

Route::post('storre/clausura', 'DirectorAdministrativoController@storeClausura')->name('store.clausura');
Route::post('store/observaciones', 'ManagementController@storeObservaciones')->name('store.observaciones');


//eliminar
Route::delete('actividad/delete/{id}/{ids}', 'DirectorAdministrativoController@deleteActividad')->name('delete.actividad');
Route::delete('presupuesto/delete/{id}/{ids}', 'DirectorAdministrativoController@deletePresupuesto')->name('delete.presupuesto');
Route::delete('anexo/delete/{ida}/{ids}', 'DirectorAdministrativoController@deleteAnexo')->name('delete.anexo');





Route::get('solicitud/deny/{id}', 'ManagementController@denySolicitud')->name('management.deny');
Route::get('solicitud/approve/{id}', 'ManagementController@approveSolicitud')->name('management.approve');

Route::group(['middleware' => ['cors']], function () {

    Route::post('solicitantes/search', 'SolicitanteController@action')->name('solicitante.search');
    Route::post('empleados/change', 'EmpleadoController@storeChangeDependencia')->name('empleados.change');
// VALIDACIONES
    Route::post('validate/solicitud', 'SolicitudController@validateSolicitud')->name('validate.solicitud');
    Route::post('validate/formato', 'SolicitudController@validateFormato')->name('validate.formato');
    Route::post('validate/poblacion', 'SolicitudController@validatePoblacion')->name('validate.poblacion');
    Route::post('validate/actividad', 'SolicitudController@validateActividad')->name('validate.actividad');
    Route::post('validate/presupuesto', 'SolicitudController@validatePresupuesto')->name('validate.presupuesto');
    Route::post('validate/edit/presupuesto', 'DirectorAdministrativoController@validatePresupuesto')->name('validate-edit.presupuesto');
   
    Route::post('validate/edit/anexos', 'DirectorAdministrativoController@storeFile')->name('store.file');
    Route::post('solicitud/indicador', 'IndicadorController@indicadorSolicitud')->name('add.indicador');
    

});
