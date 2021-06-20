<?php

	namespace src\Route;

	use src\Route\Define;
	use src\Controllers\HomeController;

	class Controller 
	{
		private $objDefin;
		private $controllerClass;
		private $controllerName;
		private $action;
		private $params;
		
		function __construct()
		{
			$this->objDefin = new Define;

			$this->controllClass();
		}

		function controllClass()
		{
			$this->controllerName = $this->objDefin->getControlName();

			if($this->controllerName == "home")
			{
				$this->controllClass = new HomeController;

				$this->controllClass->index();

			}
		}

		
			
		
	}

?>