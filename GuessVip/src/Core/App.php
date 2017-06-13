<?php

class App extends Container {

	protected $root_path;
	/**
	 * @var static
	 */
	private static $instance;

	/**
	 * @return static
	 */
	public static function instance() {
		if ( ! self::$instance instanceof self ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function setRootPath( $path ) {
		$this->root_path = $path;

		return $this;
	}


	public function path( $path = null ) {
		return $this->root_path . DIRECTORY_SEPARATOR . $path;
	}

}