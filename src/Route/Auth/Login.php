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
				$this->render("portifolio/index");
			}else{
				$this->render("login/index");
			}
		}
		else
		{
			$this->render("login/index");
		}
	}


}