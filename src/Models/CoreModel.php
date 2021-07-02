<?php

namespace src\Models;

use Exception;
use src\Libs\Connection;
use PDOException;

abstract class CoreModel
{
	private $connection;

	function __construct()
	{
		$this->connection = Connection::getConnection();
	}

	function select($sql)
	{
		if(!empty($sql))
		{
			try{
				return $this->connection->query("SELECT * FROM usuario");
			}catch(PDOException $ex){
				throw new Exception("nao foi possivel fazer a consulta no banco de dados ERRO: mensagem "  . $ex->getMessage() .  " CODE: " . $ex->getCode(), 500);
			}
		}
	}
}

?>