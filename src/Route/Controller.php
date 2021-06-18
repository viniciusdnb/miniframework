<?php

	namespace src\Route;

	use src\Route\Define;
	use src\Controllers\HomeController;

	class Controller 
	{
		private $objDefin;
		private $controller;
		private $action;
		private $params;
		
		function __construct()
		{
			$this->objDefin = new Define;
		}

		function controllClass()
		{
			if($this->objDefin->getControlName() == "home")
			{
				$this->controller = new HomeController;

				$this->controller->index();
			}
		}

		
			
		
	}

?>