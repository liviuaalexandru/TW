<?php

/***
 * Class Connection
 */
class Connection {

	public static function make( $config ) {
		$dsn = sprintf( 'mysql:dbname=%s;host=%s', $config['name'], $config['host'] );
		try {
			return new PDO( $dsn, $config['username'], $config['password'], $config['options'] );
		} catch ( PDOException $e ) {
			die( 'Connection failed for"' . $config['name'] . '" database. Message: ' . $e->getMessage() );
		}
	}
}