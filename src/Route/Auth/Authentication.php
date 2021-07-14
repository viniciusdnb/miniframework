<?php

namespace src\Route\Auth;



abstract class Authentication
{
	protected $controllerName;
	protected $action;
	protected $params;
	protected $user;


	protected function session()
	{
		//retorna se a sessao esta valida com o usuario
		return $_SESSION["usuario"];
		
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