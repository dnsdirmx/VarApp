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


$app->post('auth/login', 'Auth\AuthController@postLogin');

$app->group(['middleware' => 'auth'], function () use ($app) {
	$app->group(['prefix' => 'api/v1'], function () use ($app) {
		$app->get('/',function () use ($app) {
			return view('varappmiento');
		});
	});

});

