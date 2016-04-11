<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$app->get('/',function () use ($app) {
		return view('varappmiento');
});


$app->get('informantes','InformanteController@index');
$app->get('informantes/{id}','InformanteController@show');
$app->get('informantes/{id}/reportes','InformanteController@getReportes');
$app->post('informantes','InformanteController@create');
$app->put('informantes/{id}','InformanteController@update');
$app->delete('informantes/{id}','InformanteController@destroy');


$app->get('reportes','ReporteController@index');
$app->post('reportes','ReporteController@create');
$app->get('reportes/{id}','ReporteController@show');
$app->put('reportes/{id}','ReporteController@update');
$app->delete('reportes/{id}','ReporteController@destroy');
$app->get('reportes/{id}/especimenes','ReporteController@getEspecimenes');
$app->get('reportes/{id}/notificaciones','ReporteController@getNotificaciones');
$app->get('reportes/{id}/informante','ReporteController@getInformante');

$app->get('ordenes','OrdenController@index');
$app->post('ordenes','OrdenController@create');
$app->get('ordenes/{id}','OrdenController@show');
$app->put('ordenes/{id}','OrdenController@update');
$app->delete('ordenes/{id}','OrdenController@destroy');
$app->get('ordenes/{id}/especies','OrdenController@getEspecies');
$app->get('ordenes/{id}/recomendaciones','OrdenController@getRecomendaciones');
$app->get('ordenes/{id}/imagenes','OrdenController@getImagenes');

$app->get('especies','EspecieController@index');
$app->post('especies','EspecieController@create');
$app->get('especies/{id}','EspecieController@show');
$app->put('especies/{id}','EspecieController@update');
$app->delete('especies/{id}','EspecieController@destroy');
$app->get('especies/{id}/areas','EspecieController@getAreas');
$app->get('especies/{id}/especimenes','EspecieController@getEspecimenes');
$app->get('especies/{id}/orden','EspecieController@getOrden');
$app->get('especies/{id}/respuesta','EspecieController@getRespuesta');
$app->get('especies/{id}/imagenes','EspecieController@getImagenes');

$app->get('responsables','ResponsableController@index');
$app->post('responsables','ResponsableController@create');
$app->get('responsables/{id}','ResponsableController@show');
$app->put('responsables/{id}','ResponsableController@update');
$app->delete('responsables/{id}','ResponsableController@delete');
$app->get('responsables/{id}/areas','ResponsableController@getAreas');
$app->get('responsables/{id}/notificaciones','ResponsableController@getNotificaciones');

$app->get('notificaciones','NotificacionController@index');
$app->get('notificaciones/{id}','NotificacionController@show');
$app->delete('notificaciones/{id}','NotificacionController@destroy');
$app->get('notificaciones/{id}/responsable','NotificacionController@getResponsable');
$app->get('notificaciones/{id}/reporte','NotificacionController@getReporte');

$app->get('recomendaciones','RecomendacionController@index');
$app->get('recomendaciones/{id}','RecomendacionController@show');
$app->post('recomendaciones','RecomendacionController@create');
$app->put('recomendaciones/{id}','RecomendacionController@update');
$app->delete('recomendaciones/{id}','RecomendacionController@destroy');
$app->get('recomendaciones/{id}/orden','RecomendacionController@getOrden');
$app->get('recomendaciones/{id}/imagenes','RecomendacionController@getImagenes');

$app->get('preguntas','PreguntaController@index');
$app->get('preguntas/{id}','PreguntaController@show');
$app->post('preguntas/{id}','PreguntaController@create');
$app->put('preguntas/{id}','PreguntaController@update');
$app->delete('preguntas/{id}','PreguntaController@destroy');
$app->get('preguntas/{id}/respuestas','PreguntaController@getRespuestas');
$app->get('preguntas/{id}/imagenes','PreguntaController@getImagenes');

$app->get('especimenes','EspecimenController@index');
$app->post('especimenes','EspecimenController@create');
$app->get('especimenes/{id}','EspecimenController@show');
$app->put('especimenes/{id}','EspecimenController@update');
$app->delete('especimenes/{id}','EspecimenController@destroy');
$app->get('especimenes/{id}/imagenes','EspecimenController@getImagenes');
$app->get('especimenes/{id}/reporte','EspecimenController@getReporte');
$app->get('especimenes/{id}/especie','EspecimenController@getEspecie');


$app->get('respuestas','RespuestaController@index');
$app->post('respuestas','RespuestaController@create');
$app->get('respuestas/{id}','RespuestaController@show');
$app->put('respuestas/{id}','RespuestaController@update');
$app->delete('respuestas/{id}','RespuestaController@destroy');
$app->get('respuestas/{id}/pregunta','RespuestaController@getPregunta');
$app->get('respuestas/{id}/siguiente','RespuestaController@getSiguiente');
$app->post('respuestas/{id}/siguiente','RespuestaController@setSiguiente');

$app->get('areas','AreaController@index');
$app->post('areas','AreaController@create');
$app->get('areas','AreaController@show');
$app->put('areas','AreaController@update');
$app->delete('areas','AreaController@destroy');

$app->post('imagenes/', 'ImagenController@create'); //envia el archivo de imagen y regresa el json de la imagen 
$app->put('imagenes/{id}', 'ImagenController@update'); //actualiza los datos de la imagen por json
$app->put('imagenes/{id}/imagen','ImagenController@updateFile'); //actualiza el  archivo de la imagen
$app->get('imagenes/{id}', 'ImagenController@show');    //regresajson de la imagen 
$app->get('imagenes/{id}/imagen', 'ImagenController@showFile');    // regresa el archivo       
$app->delete('imagenes/{id}', 'ImagenController@destroy'); //elimina los datos y el arhivo de la imagen

$app->post('auth/login', 'Auth\AuthController@postLogin');

$app->group(['middleware' => 'auth'], function () use ($app) {
	$app->group(['prefix' => 'api/v1'], function () use ($app) {
		$app->get('/',function () use ($app) {
			return view('varappmiento');
		});
	});

});

