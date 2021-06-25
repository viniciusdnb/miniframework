<?php

namespace src\Controllers;

use src\Route\RouterController;

class PortifolioController extends RouterController
{
	function index()
	{
		$this->render("portifolio/index");
	}
}

?>