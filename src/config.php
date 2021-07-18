<?php

namespace src;

class Config
{
	//classe de definição de contantes publica
	function __construct()
	{
		define("DIR", __DIR__);
		
		$producao = false;

		if($producao)
		{
			define("APP_HOST", "https://localhost/public/");
		
		}else
		{
			define("APP_HOST", "http://localhost/public/");
		}

		define("DB_DRIVER", "mysql");
		define("DB_HOST",   "127.0.0.1");
		define("DB_NAME",   "app");
		define("DB_USER",   "root");
		define("DB_PASS",   "");


		
	}
}

?>