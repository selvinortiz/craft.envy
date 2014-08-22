<?php

/**
 * Database configuration file
 *
 * @see	craft/app/etc/config/defaults.php
 */
$envyFile	= dirname(__FILE__).'/local/db.php';
$dbConfig	= array(
	'*'					=> array(
		'server'		=> 'localhost',
		'user'			=> 'root',
		'password'		=> 'secret',
		'tablePrefix'	=> 'craft',
	),
	'.com'				=> array(
		'user'			=> 'root',
		'password'		=> 'secret',
		'database'		=> 'livedb',
	),
);

return array_merge($dbConfig, file_exists($envyFile) ? include($envyFile) : array());
