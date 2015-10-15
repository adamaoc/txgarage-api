<?php

// Create a global configuration
// $GLOBALS['config'] = array(
// 	'mysql' => array(
// 		'host' 		=> 'localhost',
// 		'username' 	=> 'root',
// 		'password' 	=> 'root',
// 		'db' 		=> 'stats'
// 	)
// );

$config = $_SERVER['DOCUMENT_ROOT'] . '/app/config.php';
if(file_exists($config)) {
	require_once $config;
}else{
	echo "<br>Need to setup Project.<br>";
	// var_dump($_SERVER['REQUEST_URI']);
	if($_SERVER['REQUEST_URI'] == '/home/setup/') {
		echo "<br>working...<br>";
	}else{
		die;
	}
}

// spl_autoload_register('autoload');
spl_autoload_register(function($class) {
	require_once $_SERVER['DOCUMENT_ROOT'] . '/app/core/' . $class . '.php';
});
