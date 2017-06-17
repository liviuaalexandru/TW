<?php


class Session extends Bag {

	/**
	 * Session constructor.
	 */
	public function __construct() {

		parent::__construct($_SESSION);
	}


	public function push( $value ) {
		$_SESSION[] = $value;
		return parent::push( $value );
	}

	public function offsetSet( $offset, $value ) {
		$_SESSION[$offset] = $value;
		parent::offsetSet( $offset, $value );
	}

	public function offsetUnset( $offset ) {
		unset($_SESSION[$offset]);
		parent::offsetUnset( $offset );
	}


}