<?php

namespace src\Controllers;


use src\Route\RouterController;
USE src\Models\PermClassUserModel;


class HomeController extends RouterController
{
	public function index()	
	{	
		$this->render("home/index");
		
	}
}

?>