<?php

namespace src\Controllers;

use src\Route\RouterController;
use src\Route\WebRoute;

class ProdutoController extends RouterController
{
	function route()
	{
		$wRoute = new WebRoute;

		$this->setUrl($wRoute->routeProdutos());
	}

	function index()
	{
		
		$this->route();

		$this->renderAss("produto/index");

	}

	function read()
	{
		$dados = ["produtos" => [0 => ["nome" => "celular", "marca" => "samsung", "valor" => 1995],	1 => ["nome" => "celular", "marca" => "iphone", "valor" => 1995]]];

		echo json_encode($dados);
	}

	function create()
	{
		$this->route();

		$this->renderAss("produto/create");
	}
}

?>