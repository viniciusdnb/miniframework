<?php

namespace src\Route;

use src\Route\Route;
use src\Route\WebRoute;



abstract class RouterController{
	
	public $data = [];
	public $url = [];

	function render($view)
	{	
		//envia dados para a view
		$data = $this->getData();

		//inclui funcoes auxiliares
		include DIR . "/Libs/functions.php";			

		//funcao que rendeniza as views
		require_once DIR . "/Views/layout/head.php";
		require_once DIR . "/Views/layout/main.php";
		//require_once DIR . "/Views/layout/menu.php";		
		require_once DIR . "/Views/" . $view . ".php";		
		require_once DIR . "/Views/layout/footer.php";
	}

	function renderAss($view)
	{
		$data = $this->getData();
		$url = $this->getUrl();
				
		require_once DIR . "/Views/" . $view . ".php";
		
	}

	function redirect($view)
	{
		//funcao que redireciona escrevendo no cabeçalho http
		//header("Location: " . APP_HOST .$view);
	}

	function setData($name, $data)
	{		
		$this->data[$name] = $data;
	}

	function setUrl($url)
	{
		$this->url = $url;
	}

	function getData()
	{
		return $this->data;
	}

	function getUrl()
	{
		return $this->url;
	}
}

?>