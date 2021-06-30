<?php

namespace src\Controllers;


use src\Route\RouterController;
use src\Route\WebRoute;
use src\Libs\Connection;

class HomeController extends RouterController
{
	public function index()	
	{
				
		
		$this->render("home/index");
	}
}

?>