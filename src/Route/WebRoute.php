<?php

namespace src\Route;

class WebRoute
{

	//classe responsavel por criar os  links das rotas
	//classe / metodo

	function routeHome()
	{
		$wRoute["produto"] = "produto/index";
	
		return $wRoute;
	}
	

	function routeProdutos()
	{
		$wRoute["i"] = "produto/index";
		$wRoute["c"] = "produto/create";
		$wRoute["r"] = "produto/read";

		return $wRoute;

	}

}

?>