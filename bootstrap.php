<?php
// DEPENDENCY INJECTION
// Practic harta fiecarei dependente
// Atunci cand este chemata clasa 'abstracta'(cheia) se apeleaza functia anonima si se rezolva clasa  stocata in containerul aplicatiei necesara/pe care vrem sa o returnam
$app = App::instance()->setRootPath( __DIR__ );

$app->singleton('config', function($app) { //closure, callabla, functie anonima
	$config =  require $app->path('config.php');
	return new Bag($config); // Returnez clasa corespunzatoare cheiei
});
//definit ca singletone pt a returna aceeasi instanta de fiecare data cand este apelata
$app->singleton( 'db', function ( $app ) {
	$config = $app['config']['database'];
	return new QueryBuilder( Connection::make( $config ) );
} );


$app->singleton('router', function(App $app){
	$routes = require $app->path('routes.php');
	return new Router($routes);
});

$app->singleton( 'view', function (App $app) {
	return new View( $app->path('views') );
} );

$app->singleton('request', Request::class);
$app->singleton('session', Session::class);