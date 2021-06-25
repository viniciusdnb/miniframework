<?php

namespace src\Controllers;

use src\Route\RouterController;
use src\Route\WebRoute;

class ProdutoController extends RouterController
{	
	function index()
	{	
		
		$this->render("produto/index");
	}

	function dados()
	{
		$dados = [0 => ["nome" => "celular", "marca" => "samsung", "valor" => 1995],	1 => ["nome" => "celular", "marca" => "iphone", "valor" => 1995]];

		$this->setData("dados", $dados);

		$this->render("produto/dados");
		
	}

	
}

?>