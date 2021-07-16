<?php

namespace src\Controllers;


use src\Route\RouterController;

use src\Route\Auth\Login;

class HomeController extends RouterController
{
	public function index()	
	{	
		$this->render("home/index");
		session_destroy();
		//$login = new Login("vinicius", "123");
		
		
	}
}

?>