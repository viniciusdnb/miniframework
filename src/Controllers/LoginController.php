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

	public function r()
	{
	
		$this->redirect("login/index");
	}

	public function auth()
	{
		$user = filter_var($_POST["txt_user"], FILTER_SANITIZE_SPECIAL_CHARS);
		$pass = filter_var($_POST["txt_pass"], FILTER_SANITIZE_SPECIAL_CHARS);

		$login = new Login($user, $pass);
		//iniciar a classe auth
		//procurar pelo o usuario pelo nome
		//verificar senha
		//setar os dados do usuario na sessao
	}
}

?>