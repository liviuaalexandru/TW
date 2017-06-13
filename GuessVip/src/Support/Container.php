<?php


abstract class Container implements ArrayAccess {

	/**
	 * @var array|Bag
	 * //harta dependentelor
	 */
	protected $container = [];

	/**
	 * @var array|Bag
	 * //sunt stocate singletone-urile rezolvate
	 */
	protected $resolved = [];

	/**
	 * Container constructor.
	 */
	public function __construct() {
		$this->container = new Bag();
		$this->resolved  = new Bag();
	}

	function __get( $name ) {
		return $this->get( $name );
	}

	public function get( $key ) {
		if ( $this->container->notExists( $key ) ) {

			if ( ! class_exists( $key ) ) {
				throw new Exception( 'Class not found' );
			}

			return $this->make( $key );
		}
		$binding  = $this->container->get( $key );
		$resolver = $binding['resolver'];
		if ( $binding['type'] != 'singleton' ) {
			return $this->make( $resolver );
		}

		return $this->resolve($key, $resolver );
	}

	protected function make( $resolver ) {
		if ( is_string( $resolver ) ) {
			return new $resolver();
		}
		if ( is_callable( $resolver ) ) {
			return $resolver( $this );
		}

		return null;
	}


	protected function resolve($key, $resolver ) {
		if ( $this->resolved->notExists( $key ) ) {
			$this->resolved->put( $key, $this->make( $resolver ) );
		}

		return $this->resolved->get( $key );
	}

	protected function add( $key, $resolver, $type ) {
		$this->container->put( $key, compact( 'resolver', 'type' ) );

		return $type;
	}

	/**
	 * @param $abstract
	 * @param string|callable $concrete
	 * @return mixed
	 */
	public function bind( $abstract, $concrete ) {
		return $this->add( $abstract, $concrete, 'bind' );
	}

	/**
	 * @param $abstract
	 * @param string|callable $concrete
	 * @return mixed
	 */
	public function singleton( $abstract, $concrete ) {
		return $this->add( $abstract, $concrete, 'singleton' );
	}

	public function offsetExists( $offset ) {
		return $this->container->offsetExists( $offset );
	}

	public function offsetGet( $offset ) {
		return $this->get( $offset );
	}

	public function offsetSet( $offset, $value ) {
		return $this->container->offsetSet( $offset, $value );
	}

	public function offsetUnset( $offset ) {
		return $this->container->remove( $offset );
	}
}