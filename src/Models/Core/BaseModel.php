<?php

namespace src\Models\Core;

use src\Models\Core\CoreModel;

//classe responsavel por retorno de resultado

class BaseModel extends CoreModel
{
	public function find(string $sql)
	{
		//funcao responsavel por retornar resulados em formato de objetos

		$result = $this->select($sql);
		
		return $result->fetchAll(\PDO::FETCH_CLASS);

	}

	public function create(string $table, string $columns, array $values)
	{
		$result = $this->insert($table, $columns, $values);

		return $result;
	}

	public function newUpdate(string $table, string $columns, array $values, string $where)
	{
		
	}
	
}

?>