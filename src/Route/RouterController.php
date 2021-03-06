<?php

namespace src\Route;


abstract class RouterController{
	
	public $data = [];
	public $url = [];

	function render($view)
	{	
		//envia dados para a view
		$data = $this->getData();
		
		
		//inclui funcoes auxiliares
		require_once DIR . "/Libs/functions.php";			
		
		//funcao que rendeniza as views
		require_once DIR . "/Views/layout/head.php";
		require_once DIR . "/Views/layout/header.php";
		//require_once DIR . "/Views/layout/nav.php";
		$this->menu($view);
		/*if(file_exists(DIR . "/Views/".$this->menu($view))){
			require_once DIR . "/Views/".$this->menu($view);
		}*/
		require_once DIR . "/Views/layout/main.php";				
		require_once DIR . "/Views/" . $view . ".php";		
		require_once DIR . "/Views/layout/footer.php";
	}

	private function menu($view)
	{
		$dir = explode("/", $view);
		if(file_exists(DIR . "/Views/".$dir[0] . "/menu.php"))
		{
			return require_once DIR . "/Views/".$dir[0] . "/menu.php";
		}
		
	}
	function renderAss($view)
	{
		require_once DIR . "/Libs/functions.php";
				$this->menu($view);
		require_once DIR . "/Views/" . $view . ".php";
		
	}

	function redirect($view = null)
	{
		//funcao que redireciona escrevendo no cabeçalho http
		header('Location: '. APP_HOST .$view);
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