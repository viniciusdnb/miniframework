<?php

namespace src\Controllers;

use src\Route\RouterController;

class JsonController extends RouterController
{
	function index()
	{
		$this->renderAss("json/index");
	}

	function dados()
	{
		$dado = ["dados"=> ["nome" => "vinicius", "idade" => 29]];

		echo json_encode($dado);
	}
}