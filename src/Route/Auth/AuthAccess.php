<?php

namespace src\Route\Auth;

use src\Route\PublicActions;
use src\Route\PublicControllers;

abstract class AuthAccess 
{
	protected $controllerName;
	protected $action;
	protected $params;
	protected $user;


	protected function userSession()
	{
		//retorna se a sessao esta valida e com o usuario
		return isset($_SESSION["user"]) && isset($_SESSION["auth"]);
		
	}

	protected function verifyPublicControl()
	{
		if($this->controllerName == "home" || $this->controllerName == "index")
		{
			return true;
		}		

		for($i = 0;$i < count(PublicControllers::publicControlls()); $i++)
		{
			if($this->controllerName == PublicControllers::publicControlls()[$i]){
				return true;
			}

		}
		return false;
	}

	protected function accessClass()
	{
		
		//funcao que verifica os acesso as classes
		$class = $_SESSION["class"];
		
		for($i = 0; $i < count($class); $i++)
		{
			if($this->controllerName == $class[$i])
			{
				return true;
			}
		}

		return false;
	}
	protected function verifyPublicAction()
	{
		for($i = 0; $i < count(PublicActions::publicAction()); $i++)
		{
			if($this->action == PublicActions::publicAction()[$i])
			{
				return true;
			}
		}

		return false;
	}
	protected function accessAction()
	{
		
		//funcao que verifica os acessos aos metodos da classe
		$action = $_SESSION["action"];

		for($i = 0; $i < count($action); $i++)
		{
			if($this->action == $action[$i])
			{
				return true;
			}
		}

		return false;
	}
}

?>