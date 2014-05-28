<?php
/**
 * @see	craft/app/etc/config/defaults/general.php
 */

$envyProtocol		= isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ? 'https://' : 'http://';
$envyGeneralConfig	= array(
	// @global config
	'*'							=> array(
		'environmentVariables'	=> array(
			'siteUrl'			=> $envyProtocol.$_SERVER['SERVER_NAME'].'/',
			'fileSystemPath'	=> dirname(__FILE__).'/../../public/',
		),
	),
	// @staging config (dev.site.com)
	'dev.'				=> array(
		'devMode'		=> true,
	),
);

return array_merge($envyGeneralConfig, is_readable('local/general.php') ? include('local/general.php') : array());
