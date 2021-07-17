<?php

	namespace src\Route;

	use src\Route\Define;
	use src\Controllers\HomeController;
	use Exception;
	use src\Route\Auth\AuthAccess;
	

class Start extends AuthAccess
	{
		private $objDefin;
		private $objectController;
		private $actionController;
		
		
		
		function __construct()
		{
			$this->objDefin = new Define;
			$this->controllerName = $this->objDefin->getControlName();
			$this->action = $this->objDefin->getActionName();
			$this->params = $this->objDefin->getParams();
			$this->start();

			
		}

		private function start()
		{
				
					//verifica se o nome da classe pedido é publico
				if($this->verifyPublicControl())
				{
					//alem da classe existir ela nao pode retornar erro
					if($this->startObjectController($this->controllerName))
					{
						
						//inicia a acao do controller
						$this->startActionController();
					}

				}
				//se a classe nao for public verifica se tem usuario setado.
				elseif($this->userSession())
				{		
							
					//verifica se o usuario tem acesso a classe pedido
					if($this->accessClass())
					{
						if($this->startActionController($this->controllerName))
						{
							//verifica se o usuario tem acesso a acao pedido
							if($this->accessAction())
							{
								$this->startActionController();	
							}
							else
							{
								//retorna para o index do controller
								$this->action = "index";
								$this->startActionController();
							}
						}
					}
					else
					{	
						//retorna para a home da aplicacao
						$this->startObjectController("home");
						unset($this->action);		
						$this->startActionController();
					}
				}
				else
				{					
					//redireciona para o login controller
					$this->startObjectController("login");
					unset($this->action);					
					$this->startActionController();
				}
			
		}

		private function startObjectController($nameClassControll)
		{
			$nameClassControll = ucfirst($nameClassControll) . "Controller";
			$controllFile = $nameClassControll . ".php";

			//verifica se o arquivo existe
			if(!file_exists(DIR. "/Controllers/" . $controllFile)){
			
				throw new Exception("Pagina nao encontrada Erro:. Desculpe o Arquivo não Existe", 404);		

			}else{

				//verifica se a classe existe passando o caminho do arquivo
				if(!class_exists("\\src\Controllers\\".$nameClassControll)){
						
					throw new Exception("Pagina não encontrada Erro.: Desculpe a Classe nao foi implementada", 501);			

				}
				else
				{
					$nameClassControll = "\\src\Controllers\\" . $nameClassControll;
					$this->objectController = new $nameClassControll;
					return true;
				}

			}
		}		

		private function getObjectController()
		{
			return $this->objectController;
		}

		private function startActionController()
		{
			//verifica se o metodo esta setado.
			if(isset($this->action))
			{
				//verfica se o metodo existe e se acao esta setado
				if(!method_exists($this->getObjectController(), $this->action) && isset($this->action)){
					
					throw new Exception("Pagina não encontrada Erro.: Desculpe a Acao nao implementada", 406);
			
				}else{
				
					$this->getObjectController()->{$this->action}($this->params);
					return;
				}
				
			//verifica se existe a acao index na classe
			}elseif(method_exists($this->objectController, "index")){
				
				$this->getObjectController()->index();
				return;

			}else{
				throw new Exception("Erro desconhecido", 500);
			}
		}

	}

?>