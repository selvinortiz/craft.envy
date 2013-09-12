<?php

/**
 * This Craft install uses envy to handle distributed environments
 *
 * @author		Selvin Ortiz <selvin@selv.in>
 * @package		Envy
 * @category	PHP, Craft, Env
 * @version		v0.9.0
 */

$envPath	= realpath( __DIR__.'/../env' );
$craftPath	= realpath( __DIR__.'/../craft' );
$envFile	= $envPath.'/env.php';
$craftFile	= $craftPath.'/app/index.php';

if ( ! is_readable( $envFile ) ) {
	exit( '<pre>Please ensure that '.$envFile.' exists and it is readable!</pre>' );
}

if ( ! is_readable( $craftFile ) ) {
	exit( '<pre>Please ensure that '.$craftFile.' exists and it is readable!</pre>' );
}

require_once $envFile;
require_once $craftFile;
