<?php

	namespace src\Route;

	use src\Route\Tratament;
	
	
	class Define 
	{
		private $url;
		private $arrayUrl;
		private $controlName;
		private $actionName;
		private $params;
		
		function __construct()
		{
			$this->url = new Tratament();
			
			

			$this->explodeUrl();

		}

		private function explodeUrl()
		{
			if($this->url->getUrl())
			{
				$this->arrayUrl = explode("/", $this->url->getUrl());

				$this->sets();
			}else
			{
				$this->controlName = "home";
			}
			
		}
		
		private function sets()
		{
			$this->controlName 	= $this->verifyArray($this->getArrayUrl(),0);
			$this->actionName 	= $this->verifyArray($this->getArrayUrl(), 1);
			$this->params 			= $this->verifyArray($this->getArrayUrl(), 2);			

		}
		
		private function getArrayUrl()
		{
			return $this->arrayUrl;
		}
		

		private function verifyArray(array $array, int $key)
		{
			if(isset($array[$key]) && !empty($array[$key]))
			{
				return $array[$key];
			}else
			{
				return null;
			}
		}

		private function url()
		{
			return $this->url->getUrl();
		}

		function getControlName()
		{
			
			return $this->controlName;
		}

		function getActionName()
		{
			return $this->actionName;
		}

		function getParams()
		{
			return $this->params;
		}
	}
?>