<?php

/**
 * $myEnvKey
 * The domain name (example.dev) or pattern (.dev) Craft should match against.
 *
 * @var <string>
 */
$myEnvKey	= '.dev';

/**
 * $myDbConfig
 * The db config array for your local environment.
 *
 * @var	<array>
 */
$myDbConfig = array(
	'user'		=> 'root',
	'password'	=> 'password',
	'database'	=> 'database',
	'server'	=> 'localhost',
	'port'		=> '3306',
);

/**
 * $myGeneralConfig
 * The general config array for your local environment.
 *
 * @var	<array>
 */
$myGeneralConfig = array(
	'devMode'	=> true,
);

//----------------------------------------------------------------------
// @=OUTPUT
// Once our local config has been injected into the global config,
// the following output may be generated and returned to Craft.
//----------------------------------------------------------------------

# 	@db
#	array(
#
#		'*' => array(
#			'server'	=> 'localhost'
#		),
#
#		'.dev' => array(
#			'user'		=> 'root',
#			'password'	=> 'password',
#			'database'	=> 'database',
#			'server'	=> 'localhost',
#			'port'		=> '3306'
#		)
#	);

# 	@general
#	array(
#
#		'*' => array(
#			'devMode'	=> false
#		),
#
#		'.dev' => array(
#			'devMode'	=> true,
#		)
#	);
