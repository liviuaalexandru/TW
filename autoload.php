<?php
// Functie din php chemata automat atunci cand nu gaseste clasa
spl_autoload_register( function ( $class ) {
	$root        = 'src';
	$directories = [
		'Core',
		'Models',
		'Support',
		'Database',
		'Controllers',
	];

	foreach ( $directories as $directory ) {
		$path = $root . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $class . '.php';
		if ( file_exists( $path ) ){
			require_once( $path );
			return;
		}
	}
} );


