<?php
/**
 * 
 *
 */
return array(
	/**
	 * Base config, just need to set the DSN, username and password in env. config.
	 */
	'fuelpress' => array(
		'type'        => 'pdo',
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=wordpress',
			'username'   => 'root',
			'password'   => 'root',
			'persistent' => false,
		),
		'identifier'   => '`',
		'table_prefix' => 'wp_',
		'charset'      => 'utf8',
		'enable_cache' => true,
		'profiling'    => false,
	),
);
