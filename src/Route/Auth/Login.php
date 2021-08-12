<?php

namespace src\Route\Auth;

use src\Route\RouterController;
use src\Route\Auth\Auth;

class Login extends RouterController
{
	function __construct($name, $pass)
	{
		$auth = new Auth;
		if($auth->searchUser($name))
		{
			if($auth->verifPass($pass))
			{
				//redirecionar para a pagina inicial da aplicacao
				//primeira classe é o que o usuario tem acesso em sua aplicacao
				$this->redirect($_SESSION["class"][0] . "/index");
			}else{
				$this->redirect("login/index");
			}
		}
		else
		{
			$this->redirect("login/index");
		}
	}


}