<?php


class Request extends Bag {

	protected $uri;

	/**
	 * Request constructor.
	 */
	public function __construct() {
		$items = array_merge($_GET, $_POST);

		$this->uri = $this->parseUri();

		parent::__construct($items);
	}


	protected function parseUri() {
		return trim(
			parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
			'/'
		);
	}

	public function uri() {
		return $this->uri;
	}

}