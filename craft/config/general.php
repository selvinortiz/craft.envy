<?php

/**
 * General configuration file
 *
 * @see	craft/app/etc/config/defaults/general.php
 */
$envyFile		= dirname(__FILE__).'/local/general.php';
$envySecure		= isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on');
$generalConfig	= array(
	'*' => array(
		'environmentVariables'	=> array(
			'siteUrl'			=> $envySecure ? 'https://' : 'http://' . $_SERVER['SERVER_NAME'].'/',
			'fileSystemPath'	=> dirname(__FILE__).'/../../public/',
		),
	),
	'.com'			=> array(
		'devMode'	=> false,
	),
);

return array_merge($generalConfig, file_exists($envyFile) ? include($envyFile) : array());
