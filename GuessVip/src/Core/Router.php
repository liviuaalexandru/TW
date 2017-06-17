<?php


class Router {

	protected $routes = [];

	/**
	 * Router constructor.
	 *
	 * @param array $routes
	 */
	public function __construct( array $routes ) { $this->routes = $routes; }


	public function direct( $uri ) {
		if(!array_key_exists($uri, $this->routes)){
			throw new Exception('Route not defined for this uri: ' . $uri);
		}

		return $this->routes[$uri];
	}
}