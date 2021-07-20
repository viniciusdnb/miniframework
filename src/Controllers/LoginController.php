<?php

namespace src\Controllers;

use src\Route\RouterController;
use src\Route\Auth\Login;

class LoginController extends RouterController
{
	public function index()
	{
		$this->render("login/index");
	}



	public function auth()
	{
		header("Content-Type: application/json; charset=UTF-8");
		$form = json_decode($_POST["x"],false);

		if(preg_match("/[a-zA-Z0-9]/", $form->user) && preg_match("/[a-zA-Z0-9]/", $form->pass)){
			$user = filter_var($form->user, FILTER_SANITIZE_SPECIAL_CHARS);
			$pass = filter_var($form->pass, FILTER_SANITIZE_SPECIAL_CHARS);
			$login = new Login($user, $pass);
		}else{
			$this->redirect("");
		}

		

		//
		//iniciar a classe auth
		//procurar pelo o usuario pelo nome
		//verificar senha
		//setar os dados do usuario na sessao
	}
}

?>