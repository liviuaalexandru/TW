<?php


/**
 * @param null $make
 * @return App|mixed|null
 */
function app( $make = null ) {
	$app = App::instance();
	if ( is_null( $make ) ) {
		return $app;
	}

	return $app->get( $make );
}

function config( $key = null, $default = null ) {
	/**
	 * @var Bag $config
	 */
	$config = app( 'config' );
	if ( is_null( $key ) ) {
		return $config;
	}

	return $config->get( $key, $default );
}


/**
 * @param string $uri
 * @return Router|string
 */
function router( $uri = null ) {
	$router = app( 'router' );
	if ( is_null( $uri ) ) {
		return $router;
	}

	return $router->direct( $uri );
}

/**
 * @return Request
 */
function request() {
	return app( 'request' );
}

/**
 * @param string $file
 * @param array $params
 * @return View|string
 */
function view( $file = null, $params = [] ) {
	/**
	 * @var View $view
	 */
	$view = app( 'view' );
	if ( is_null( $file ) ) {
		return $view;
	}

	return $view->make( $file, $params );
}

function redirect( $url ) {
	header( 'Location: ' . $url );
}

function referrer() {
	return $_SERVER['HTTP_REFERER'];
}

/**
 * @return Session
 */
function session() {
	return app( 'session' );
}

/**
 * @return QueryBuilder
 */
function db() {
	return app( 'db' );
}

function back() {
	redirect( referrer() );
}

function dd( $data = null ) {
	if ( is_null( $data ) ) {
		die();
	}
	echo '<pre>';
	var_dump( $data );
	echo '</pre>';
	die();
}


function auth_is_logged() {
	return session()->exists( 'auth' );
}

/**
 * @return User|null
 */
function auth() {
	return session()->get( 'auth' );
}

/**
 * @return Game
 */
function game() {
	if ( session()->notExists( 'game' ) ) {
		session()->put( 'game', new Game() );
	}

	return session()->get( 'game' );
}