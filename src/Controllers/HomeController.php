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
		$usuario->update(["updade", "update@update"], "idUsuario = 5");
		//$this->render("home/index");
	}
}

?>