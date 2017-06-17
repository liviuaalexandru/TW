<?php


class View {

	protected $views_path;

	/**
	 * View constructor.
	 *
	 * @param $views_path
	 */
	public function __construct( $views_path ) { $this->views_path = $views_path; }


	protected function path( $path ) {
		return $this->views_path . '/' . $path . '.php';
	}


	protected function normalizePath( $path ) {
		return str_replace( '.', '/', $path );
	}

	public function make( $view, $params = [] ) {
		extract( $params );
		$file = $this->path( $this->normalizePath( $view ) );
		require $file;
	}
}