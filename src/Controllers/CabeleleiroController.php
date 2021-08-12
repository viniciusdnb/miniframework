<?php

namespace src\Controllers;

use src\Route\RouterController;

class CabeleleiroController extends RouterController
{
	public function index()
	{
		$this->renderAss("cabeleleiro/index");
	}

	public function lancamentos()
	{
		$this->render("cabeleleiro/lancamentos");
	}
}
?>