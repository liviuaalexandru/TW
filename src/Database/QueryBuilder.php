<?php


class QueryBuilder {

	/**
	 * @var PDO
	 */
	protected $pdo;
	protected $query = [];
	public $class;

	/**
	 * QueryBuilder constructor.
	 *
	 * @param $pdo
	 */
	public function __construct( PDO $pdo ) {
		$this->pdo = $pdo;
	}


	public function selectAll( $table, $intoClass = null ) {
		$statement = $this->pdo->prepare( "select * from {$table}" );
		$statement->execute();

		return $statement->fetchAll( PDO::FETCH_CLASS, $intoClass );
	}

	/**
	 * @param $table
	 * @param $fields
	 * @return PDOStatement
	 */
	public function insert( $table, $fields ) {
		$columns = $this->formatColumns( $fields );
		$values  = $this->formatValues( $fields );
		$sql     = "INSERT INTO $table ($columns) VALUES ($values)";

		return $this->query( $sql );
	}


	/**
	 * @param $table
	 * @param $where
	 * @param $values
	 * @return PDOStatement
	 */
	public function update( $table, $where, $values ) {
		$columns = [];
		foreach ( $values as $key => $value ) {
			$columns[] = "$key='$value'";
		}
		$columns = implode( ',', $columns );

		$key   = key( $where );
		$value = $where[ $key ];
		$where = "$key='$value'";

		$sql = "UPDATE $table SET $columns WHERE $where";

		return $this->query( $sql );
	}

	/**
	 * @param $key
	 * @param null $value
	 * @param string $operator
	 * @return string
	 */
	protected function whereClause( $key, $value = null, $operator = '=' ) {
		if ( ! is_array( $key ) ) {
			return "$key$operator'$value'";
		}

		$conditions = $key;
		$k          = key( $conditions );
		$v          = $conditions[ $k ];
		$where      = "$k='$v'";

		return $where;
	}

	/**
	 * @param $table
	 * @param $where
	 * @return PDOStatement
	 */
	public function delete( $table, $where ) {
		$where = $this->whereClause( $where );
		$sql   = "delete from $table where $where";

		return $this->query( $sql );
	}

	/**
	 * @param $sql
	 * @return PDOStatement
	 */
	public function query( $sql ) {
		return $this->pdo->query( $sql );
	}

	/**
	 * @param $table
	 * @param string $columns
	 * @return $this
	 */
	public function select( $table, $columns = '*' ) {
		if ( is_array( $columns ) ) {
			$columns = $this->getColumns( $columns );
		}

		$this->query[] = "select $columns from $table";

		return $this;
	}

	/**
	 * @param $key
	 * @param $value
	 * @param string $operator
	 * @return $this
	 */
	public function where( $key, $value = null, $operator = '=' ) {

		$condition     = $this->whereClause( $key, $value, $operator );
		$this->query[] = "where $condition";

		return $this;
	}

	/**
	 * @param $columns
	 * @param string $order
	 * @return $this
	 */
	public function orderBy( $columns, $order = 'ASC' ) {
		if ( is_array( $columns ) ) {
			$columns = $this->formatValues( $columns );
		} else {
			$columns = "$columns";
		}
		$this->query[] = "order by $columns $order";

		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function limit( $value ) {
		$this->query[] = "limit $value";

		return $this;
	}

	public function reset() {
		$this->query = [];

		return $this;
	}


    protected function _fetch()
    {
        $statement = implode( ' ', $this->query );
        $query  = $this->query( $statement );

        if($this->class){
            $result = $query->fetchAll( PDO::FETCH_CLASS, $this->class );
        } else {
            $result = $query->fetchAll(PDO::FETCH_OBJ);
        }

        $this->reset();
        if ( ! $result ) {
            return false;
        }
        return $result;

        if ( count( $result ) == 1 ) {
            return $result[0];
        }

        return new Bag( $result );
	}

    public function first()
    {
        $result = $this->_fetch()[0];
	}

	/**
	 * @return array|bool|Bag
	 */
	public function get() {
		$statement = implode( ' ', $this->query );
		$query  = $this->query( $statement );

		if($this->class){
			$result = $query->fetchAll( PDO::FETCH_CLASS, $this->class );
		} else {
			$result = $query->fetchAll(PDO::FETCH_OBJ);
		}

		$this->reset();
		if ( ! $result ) {
			return false;
		}

		if ( count( $result ) == 1 ) {
			return $result[0];
		}

		return new Bag( $result );
	}

	/**
	 * @param $columns
	 * @return string
	 */
	protected function getColumns( $columns ) {
		return implode( ',', $columns );
	}

	/**
	 * @param $fields
	 * @return string
	 */
	protected function formatColumns( $fields ) {
		return $this->getColumns( array_keys( $fields ) );
	}

	/**
	 * @param $fields
	 * @param string $glue
	 * @return string
	 */
	protected function formatValues( $fields, $glue = ',' ) {
		$values = implode( $glue, array_map( function ( $item ) {
			return "'$item'";
		}, $fields ) );

		return $values;
	}
}