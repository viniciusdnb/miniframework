<?php

namespace src\Controllers;

use src\Route\RouterController;

class PortifolioController extends RouterController
{
	function index()
	{
		echo "pagina inicial portifolio";
	}

	function portifolio()
	{
		$this->render("portifolio/index");
	}

	function logout()
	{
		
		session_destroy();
		$this->redirect("home/index");
	}
}

?>