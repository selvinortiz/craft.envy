<?php

/**
 * General configuration file, @see craft/app/etc/config/defaults/general.php
 *
 * 1. Defines base general configs for all (*) and for production (.com) environments
 * 2. Fetches the file with general configs for the local environment
 * 3. Merges base and local general configs or returns the base configs if nothing is found for local
 */
$generalConfig	= array(
	'*' => array(
		'environmentVariables'	=> array(
			'baseUrl'	=> '/',
			'basePath'	=> '../../public/',
		),
	),
	'.com'	=> array(
		'devMode'	=> false,
	),
);

$envyGeneralConfig = @include('local/general.php');

return is_array($envyGeneralConfig) ? array_merge($generalConfig, $envyGeneralConfig) : $generalConfig;
