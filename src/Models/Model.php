<?php


abstract class Model {

	protected $table;
	protected $attributes = [];
	protected $fields = [];
	/**
	 * @var QueryBuilder
	 */
	private $builder;

	/**
	 * Model constructor.
	 *
	 * @param array $attributes
	 */
	public function __construct( array $attributes = [] ) {
		$this->fill($attributes);
	}


	public function fill(array $attributes ) {
		foreach ($this->fields as $field){
			if(isset($attributes[$field])){
				$this->attributes[$field] = $attributes[$field];
			}
		}
		return $this;
	}
	/**
	 * @return QueryBuilder
	 */
	protected function db() {
		if ( is_null( $this->builder ) ) {
			$this->builder = app( 'db' );
			$this->builder->class = static::class;
		}

		return $this->builder;
	}

	function __get( $name ) {
		return $this->attributes[ $name ];
	}

	function __set( $name, $value ) {
		$this->attributes[ $name ] = $value;
	}


	public function all($columns = '*') {
		return $this->db()->select($this->table, $columns)->get();
	}

	public function query( $statement ) {
		return $this->db()->query( $statement );
	}

	public function create() {
		return $this->db()->insert( $this->table, $this->attributes );
	}

	public function update( $where ) {
		return $this->db()->update( $this->table, $where, $this->attributes );
	}

	public function delete( $where ) {
		return $this->db()->delete( $this->table, $where );
	}

	function __toString() {
		return json_encode($this->attributes);
	}

	/**
	 * @param string $columns
	 * @return QueryBuilder
	 */
	public function select( $columns = '*' ) {
		return $this->db()->select($this->table, $columns);
	}
	public function find( $where, $columns = null ) {
		 $this->db()->select( $this->table, $columns?: $this->fields )->where( $where );
		 return $this;
	}

	public function where( $key, $val=null, $operator = '=' ) {
		$this->db()->where($key, $val, $operator);
		return $this;
	}

	public function limit($value) {
		return $this->db()->limit($value);
	}

	public function first() {
		$this->limit(1);
		return $this->get();
	}

	public function get() {
		return $this->db()->get();
	}

}