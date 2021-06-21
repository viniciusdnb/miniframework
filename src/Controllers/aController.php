<?php

namespace src\Controllers;

use src\Route\Router;

class aController extends Router
{

	function a()
	{
		$this->render("funcaoA");	
		//$this->redirect("a/a");	
	}

	function index()
	{
		echo "funcao index";
	}

	function red()
	{
		$this->redirect("a/a");
	}
}

?>