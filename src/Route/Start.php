<?php

	namespace src\Route;

	use src\Route\Define;
	use src\Controllers\HomeController;
	use Exception;
	use src\Route\Auth\AuthAccess;
	use src\Route\Auth\User;

class Start extends AuthAccess
	{
		private $objDefin;
		//private $controllerClass;
		
		
		function __construct()
		{
			$this->objDefin = new Define;
			$this->action = $this->objDefin->getActionName();
			$this->params = $this->objDefin->getParams();
			$this->startControllClass();

			$this->user = new User;
		}

		function startControllClass()
		{
			$this->controllerName = $this->objDefin->getControlName();

			if($this->controllerName == "home" || $this->controllerName == "index")
			{
				$this->controllClass = new HomeController;

				$this->controllClass->index();

			}
			elseif($this->controllerName == "login")
			{
				$this->login();
			}
			else			
			{	
				if($this->session())
				{
					$nameClassConrol = ucfirst($this->controllerName) . "Controller";
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
						
						$object = $this->verifyAccessClass($nameClassConrol);

						if($object != null)
						{							
							$this->verifyAccessAction($object, $this->action, $this->params);	
						}	
					}	
				}else{
					
					$this->login();

				}
			}
		}	
		
		private function login()
		{
				$class = "\\src\Controllers\\"."LoginController";
				$login = new $class;
				$login->index();
		}

		private function verifyAccessClass($nameClassConrol)
		{
			if(!$this->accessClass())
			{
				$class = "\\src\Controllers\\"."HomeController";
				$home = new $class;
				$home->index();

				return null;
			}

			return $object = new $nameClassConrol;

		}

		private function verifyAccessAction($object, $action, $params)
		{

			
						//verifica se a acao esta setada e se tem acesso se nao tiver é redirecionado para o index da class
						if(isset($action) && $this->accessAction())
						{		

							//verfica se o metodo existe e se acao esta setado
							if(!method_exists($object, $action) && isset($action)){
							
								throw new Exception("Pagina não encontrada Erro.: Desculpe a Acao nao implementada", 406);
						
							}else{
							
								$object->{$action}($params);
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

?>