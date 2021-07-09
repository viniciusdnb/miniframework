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
		$usuario->delete("idUsuario = 10");
		//$this->render("home/index");
	}
}

?>