<?php

return injectMyDbConfig(

	array(

		'*' => array(
			'user'			=> 'admin',
			'password'		=> 'secret',
			'database'		=> 'database',
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
