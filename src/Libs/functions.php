<?php

	namespace src\Libs;

	function route($route = null)
	{
		//funcao que cria url nas views
		if($route != null){
			$path = rtrim($route, "/");
					
			$path = explode("/", $path);
			$countPath = count($path);

			//0 => classe
			//1 => acao
			//2 => parametro
			
			switch($countPath)
			{
				case 1:
					return APP_HOST . $path[0] . "/index";
					break;
				case 2:
					return APP_HOST . $path[0] . "/" . $path[1];
					break;
				case 3:
					return APP_HOST . $path[0] . "/" . $path[1] . $path[2];
					break;
				default:
					return APP_HOST;
			}
		}

		return APP_HOST;		
		
	}



?>