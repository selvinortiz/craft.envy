<?php

return injectMyDbConfig(

	array(

		'*' => array(
			'tablePrefix'	=> 'craft',
			'server'		=> 'localhost',
			'port'			=> '3306'
		),

		'.com' => array(
			'user'		=> 'dbuser',
			'password'	=> 'secretpwd',
			'database'	=> 'database'
		)
	)
);
