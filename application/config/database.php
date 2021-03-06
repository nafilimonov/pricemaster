<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	'default' => array
	(
		'type'       => 'MySQLi',
		'connection' => array(
			/**
			 * The following options are available for MySQL:
			 *
			 * string   hostname     server hostname, or socket
			 * string   database     database name
			 * string   username     database username
			 * string   password     database password
			 * boolean  persistent   use persistent connections?
			 * array    variables    system variables as "key => value" pairs
			 *
			 * Ports and sockets may be appended to the hostname.
			 */
			'hostname'   => '127.0.0.1',
			'database'   => 'price3',
			'username'   => 'price3',
			'password'   => 'V0f8H6q4',
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	),
	'bitrix' => array
	(
		'type'       => 'MySQLi',
		'connection' => array(
			/**
			 * The following options are available for MySQL:
			 *
			 * string   hostname     server hostname, or socket
			 * string   database     database name
			 * string   username     database username
			 * string   password     database password
			 * boolean  persistent   use persistent connections?
			 * array    variables    system variables as "key => value" pairs
			 *
			 * Ports and sockets may be appended to the hostname.
			 */
			'hostname'   => '82.202.249.229',
			'database'   => 'dbudarnik',
			'username'   => 'userudarnik',
			'password'   => "pLX07SNgird4",
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	),

	

	'alternate' => array(
		'type'       => 'PDO',
		'connection' => array(
			/**
			 * The following options are available for PDO:
			 *
			 * string   dsn         Data Source Name
			 * string   username    database username
			 * string   password    database password
			 * boolean  persistent  use persistent connections?
			 */
			'dsn'        => 'mysql:host=localhost;dbname=price3',
			'username'   => 'price3',
			'password'   => 'V0f8H6q4',
			'persistent' => FALSE,
		),
		/**
		 * The following extra options are available for PDO:
		 *
		 * string   identifier  set the escaping identifier
		 */
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	),
	/**
	 * MySQLi driver config information
	 *
	 * The following options are available for MySQLi:
	 *
	 * string   hostname     server hostname, or socket
	 * string   database     database name
	 * string   username     database username
	 * string   password     database password
	 * boolean  persistent   use persistent connections?
	 * array    ssl          ssl parameters as "key => value" pairs.
	 *                       Available keys: client_key_path, client_cert_path, ca_cert_path, ca_dir_path, cipher
	 * array    variables    system variables as "key => value" pairs
	 *
	 * Ports and sockets may be appended to the hostname.
	 *
	 * MySQLi driver config example:
	 *
	 */
// 	'alternate_mysqli' => array
// 	(
// 		'type'       => 'MySQLi',
// 		'connection' => array(
// 			'hostname'   => 'localhost',
// 			'database'   => 'kohana',
// 			'username'   => FALSE,
// 			'password'   => FALSE,
// 			'persistent' => FALSE,
// 			'ssl'        => NULL,
// 		),
// 		'table_prefix' => '',
// 		'charset'      => 'utf8',
// 		'caching'      => FALSE,
// 	),
);
