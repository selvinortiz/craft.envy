<?php

/**
 * Distributed environment configuration for Craft
 *
 * @author		Selvin Ortiz <selvin@selv.in>
 * @package		Envy
 * @category	PHP, Craft, Env
 * @version		v0.9.0
 */

$myEnvFile = @"{$envPath}/myenv.php";

if ( file_exists( $myEnvFile ) ) {
	// myenv.php is only required locally
	require_once $myEnvFile;
}

function injectMyGeneralConfig( array $general=array() )
{
	return injectMyConfig(
		array_key_exists( 'myGeneralConfig', $GLOBALS )
		?
		$GLOBALS['myGeneralConfig']
		:
		array()
		,
		$general
	);
}

function injectMyDbConfig( array $db=array() )
{
	return injectMyConfig(
		array_key_exists( 'myDbConfig', $GLOBALS )
		?
		$GLOBALS['myDbConfig']
		:
		array()
		,
		$db
	);
}

/**
 * isMultiEnvConfig()
 *
 * Tries to figure out if global is a multi env config array
 * Mostly by assuming that the first level values should all be arrays
 *
 * @param	<array>	$global		The global config array
 * @return	<bool>				Whether global is a multi env config
 */
function isMultiEnvConfig( array $global )
{
	foreach ( $global as $env ) {
		if ( ! is_array( $env ) ) {
			return false;
		}
	}

	return true;
}

/**
 * injectMyConfig()
 *
 * Injects your local config into the global config (db|general)
 *
 * @param	<array>	$local	The local db|general config to inject
 * @param	<array>	$global	The global env config array
 * @return	<array>			The (injected) global env config array
 */
function injectMyConfig( array $local, array $global )
{
	// Ignore local config if empty or myEnvKey is missing
	if ( empty( $local ) || ! array_key_exists( 'myEnvKey', $GLOBALS ) ) { return $global; }

	// Only do injection is if global is a multi env config array
	if ( ! isMultiEnvConfig( $global ) ) { return $global; }

	if ( array_key_exists( $GLOBALS['myEnvKey'], $global ) ) {
		// Your env was defined in the global config
		// Replace it with your local config
		$global[ $GLOBALS['myEnvKey'] ] = $local;
	} else {
		// Your env was not defined in the global config
		// Assume that the (*) is the first env in the global config
		// Place your local config after (*) and before all others
		$memory = array();

		if ( array_key_exists( '*', $global ) ) {
			$memory['*'] = $global['*'];
			unset( $global['*'] );
		}

		$memory[ $GLOBALS['myEnvKey'] ] = $local;
		$global = array_merge( $memory, $global );
	}

	return $global;
}
