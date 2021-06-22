<?php

namespace src\Route;

use src\Route\Route;

abstract class RouterController{
	
	public $data = [];

	function render($view)
	{	
		//$data = $this->data;
		//funcao que rendeniza as views
		require_once DIR . "/Views/layout/head.php";		
		require_once DIR . "/Views/" . $view . ".php";
		require_once DIR . "/Views/layout/main.php";
		require_once DIR . "/Views/layout/footer.php";
	}

	function renderAss($view)
	{
		require_once DIR . "/Views/" . $view . ".php";
	}

	function redirect($view)
	{
		//funcao que redireciona escrevendo no cabeçalho http
		header("Location: " . APP_HOST .$view);
	}

	function setData($name, $data)
	{
		
		$this->data[$name] = $data;
	}

	function getData()
	{
		return $this->data;
	}
}

?>