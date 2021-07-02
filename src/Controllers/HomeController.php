<?php

namespace src\Controllers;


use src\Route\RouterController;
use src\Route\WebRoute;
use src\Libs\Connection;
use src\Models\Usuario;
use src\Models\Model;

class HomeController extends RouterController
{
	public function index()	
	{	echo "<pre>";
			$model = new Model("Usuario");

			$usuario = $model->getResult();
			var_dump($usuario[0]->nome);
			//	var_dump($usuario->find("U"));
		
		//$this->render("home/index");
	}
}

?>