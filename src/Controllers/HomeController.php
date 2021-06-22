<?php

namespace src\Controllers;


use src\Route\RouterController;

class HomeController extends RouterController
{
	public function index()
	{
		$this->render("home/index");
	}
}

?>