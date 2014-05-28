<?php
/**
 * @see	craft/app/etc/config/defaults/db.php
 */

$envyDbConfig = array(
	// @global config
	'*'					=> array(
		'server'		=> 'localhost',
		'user'			=> 'root',
		'password'		=> 'secret',
		'database'		=> 'livedb',
		'tablePrefix'	=> 'craft',
	),
	// @staging config
	'dev.'				=> array(
		'user'			=> 'root',
		'password'		=> 'secret',
		'database'		=> 'stagingdb',
	),
);

return array_merge($envyDbConfig, is_readable('local/db.php') ? include('local/db.php') : array());
