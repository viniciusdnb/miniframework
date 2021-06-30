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
			define("APP_HOST", "https://indquatropontozero.com/");
		
		}else
		{
			define("APP_HOST", "http://localhost/public/");
		}

		define("DB_DRIVER", "mysql");
		define("DB_HOST",   "localhost");
		define("DB_NAME",   "test");
		define("DB_USER",   "");
		define("DB_PASS",   "");


		
	}
}

?>