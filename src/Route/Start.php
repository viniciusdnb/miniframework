<?php

	namespace src\Route;

	use src\Route\Define;
	use src\Controllers\HomeController;
	use Exception;

	class Start 
	{
		private $objDefin;
		private $controllerClass;
		private $controllerName;
		private $action;
		private $params;
		
		function __construct()
		{
			$this->objDefin = new Define;
			$this->action = $this->objDefin->getActionName();
			$this->params = $this->objDefin->getParams();
			$this->startControllClass();
		}

		function startControllClass()
		{
			$this->controllerName = $this->objDefin->getControlName();

			if($this->controllerName == "home")
			{
				$this->controllClass = new HomeController;

				$this->controllClass->index();

			}else{
				
				$nameClassConrol = $this->controllerName . "Controller";
				$controllFIle = $nameClassConrol . ".php";

				//verifica se o arquivo existe
				if(!file_exists(DIR. "/Controllers/" . $controllFIle)){
			
					throw new Exception("Pagina nao encontrada Erro:. Desculpe o Arquivo não Existe", 404);		

				}else{
					//verifica se a classe existe passando o caminho do arquivo
					if(!class_exists("\\src\Controllers\\".$nameClassConrol)){
						
						throw new Exception("Pagina não encontrada Erro.: Desculpe a Classe nao foi implementada", 501);			

					}

					$nameClassConrol =  "\\src\Controllers\\" . $nameClassConrol;
					//instancia o objeto se nao houver erro
					$object = new $nameClassConrol;

					//verifica se a acao esta setada se nao tiver e redirecionado para o index da class
					if(isset($this->action))
					{						
						//verfica se o metodo existe e se acao esta setado
						if(!method_exists($object, $this->action) && isset($this->action)){
						
							throw new Exception("Pagina não encontrada Erro.: Desculpe a Acao nao implementada", 406);
					
						}else{
						
							$object->{$this->action}($this->params);
							return;
						}
						
						//verifica se existe a acao index na classe
					}elseif(method_exists($object, "index")){
						
						$object->index();
						return;

					}else{
						throw new Exception("Erro desconhecido", 500);
					}
				}
			}
		}	
		
	}

?>