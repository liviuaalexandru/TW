<?php

/**
 * Class Bag
 * Rol:
 *  - De a infrumuseta mediul de codare
 *  - De a usura prelucrarea/manipularea listelor
 * - De a oferi liberatea folosirii datelor
 */
class Bag implements ArrayAccess, IteratorAggregate {

	protected $items = [];

	/**
	 * Fluent constructor.
	 *
	 * @param array $items
	 */
	public function __construct( array $items = [] ) { $this->items = $items; }

	function __get( $name ) {
		return $this->get($name);
	}

	function __set( $name, $value ) {
		$this->put($name, $value);
	}


	public function count() {
		return count($this->items);
	}

	public function push( $value ) {
		$this->items[] = $value;

		return $this;
	}

	public function put( $key, $value ) {
		$this->offsetSet( $key, $value );

		return $this;
	}

	public function get( $key, $default = null ) {
		if ( ! $this->offsetExists( $key ) ) {
			return $default;
		}

		return $this->offsetGet( $key );
	}

	public function remove( $key ) {
		$this->offsetUnset( $key );
		return $this;
	}

	public function isEmpty() {
		return empty( $this->items );
	}

	public function isNotEmpty() {
		return ! $this->isEmpty();
	}

	public function exists( $key ) {
		return $this->offsetExists( $key );
	}

	public function notExists( $key ) {
		return ! $this->offsetExists( $key );
	}

	public function offsetExists( $offset ) {
		return isset( $this->items[ $offset ] );
	}

	public function offsetGet( $offset ) {
		return $this->offsetExists( $offset ) ? $this->items[ $offset ] : null;
	}

	public function offsetSet( $offset, $value ) {
		$this->items[ $offset ] = $value;
	}

	public function offsetUnset( $offset ) {
		unset( $this->items[ $offset ] );
	}

	public function toArray() {
		return $this->items;
	}

	public function toJson( $options = 0 ) {
		return json_encode($this->items, $options);
	}


	public function getIterator() {
		return new ArrayIterator( $this->items );
	}
}