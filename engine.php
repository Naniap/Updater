<?php
ini_set('display_errors', 'On');
spl_autoload_register(function ($className) {
	// Normal PHP path
	$path = $_SERVER['DOCUMENT_ROOT'] . "/php/" . $className . ".php";
	if (file_exists($path)) {
		/** @noinspection PhpIncludeInspection */
		include_once($path);
	}
});

if (!Security::hasPermission()) {
	echo ":(";
	die;
}

SQL::getConnection();
