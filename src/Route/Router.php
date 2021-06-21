<?php

namespace src\Route;

use src\Route\Route;

abstract class Router{
	

	function render($view)
	{	
		//funcao que rendeniza as views
		require_once DIR . "/Views/" . $view . ".php";
	}

	function redirect($view)
	{
		//funcao que redireciona escrevendo no cabeçalho http
		header("Location: " . APP_HOST .$view);
	}
}

?>