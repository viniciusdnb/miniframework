<?php

namespace src\Route\Auth;

class User
{
	function __construct()
	{
		
		$_SESSION["usuario"] = false;
		$_SESSION["class"] = ["login"];
		$_SESSION["action"] = ["index"];
	}

	function getUser()
	{

	}

	function compare()
	{
		
	}
}

?>