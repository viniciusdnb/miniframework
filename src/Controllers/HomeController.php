<?php

namespace src\Controllers;


use src\Route\RouterController;
use src\Route\WebRoute;
use src\Models\UsuarioModel;

class HomeController extends RouterController
{
	public function index()	
	{	echo "<pre>";
			
		$usuario = new UsuarioModel;
		$usuario->insert([["", "karina@karina"], ["pai", "pai@pai"]]);
	
		//$this->render("home/index");
	}
}

?>