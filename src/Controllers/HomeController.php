<?php

namespace src\Controllers;


use src\Route\RouterController;
use src\Route\WebRoute;

class HomeController extends RouterController
{
	function route()
	{
		$wRoute = new WebRoute;

		$this->setUrl($wRoute->routeHome());
	}
	public function index()
	{
		$this->route();
		
		$this->render("home/index");
	}
}

?>