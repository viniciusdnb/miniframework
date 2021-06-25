<?php

namespace src\Controllers;


use src\Route\RouterController;
use src\Route\WebRoute;

class HomeController extends RouterController
{
	public function index()
	{
		$this->render("home/index");
	}
}

?>