<?php

namespace src\Controllers;

use src\Route\RouterController;

class LoginController extends RouterController
{
	public function index()
	{
		$this->render("login/index");
	}
}

?>