<?php
	include_once __DIR__."/../vendor/autoload.php";

	use src\Route\Start;
	use src\config;
	session_start();
	try {
		$config = new Config;
		$start = new Start;
		
		
	
	} catch (\Exception $ex) {
		echo $ex->getMessage() ." Codigo: ". $ex->getCode();
	}



?>