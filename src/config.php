<?php

namespace src;

class Config
{
	//classe de definição de contantes publica
	function __construct()
	{
		define("DIR", __DIR__);
		
		$producao = FALSE;

		if($producao)
		{
			define("APP_HOST", "");
		}else
		{
			define("APP_HOST", "localhost/public/");
		}
		
	}
}

?>