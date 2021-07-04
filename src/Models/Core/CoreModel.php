<?php

namespace src\Models\Core;

use Exception;
use PDO;
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
				return $this->connection->query($sql);
			}catch(PDOException $ex){
				throw new Exception("nao foi possivel fazer a consulta no banco de dados \n ERRO: mensagem "  . $ex->getMessage() .  " CODE: " . $ex->getCode(), 500);
			}
		}
	}

	function insert($table, $columns, $values)
	{
		if(!empty($table) && !empty($columns) && !empty($values))
		{
		
			$params = $columns;
			$columns = str_replace(":", "", $columns);
			var_dump($values);
			try{
				$this->connection->beginTransaction();

				$stmt = $this->connection->prepare("INSERT INTO usuario ($columns) VALUES ($params)");
				
				$stmt->execute($values);

				$this->connection->commit();

			}catch(PDOException $ex)
			{
				$this->connection->rollBack();
				throw new Exception($ex->getMessage());
			}
		
		}
	}
}

?>