<?php

namespace src\Models\Core;

use src\Models\Core\Core;

//objeto responsavel por fazer ligacao ao core do crud e retornar algum tipo de resultado

class CallCore extends Core
{
	public function find(string $sql)
	{
		//funcao responsavel por retornar resulados em formato de objetos

		$result = $this->select($sql);
		
		return $result->fetchAll(\PDO::FETCH_CLASS);

	}

	public function newInsert(string $table, string $columns, array $values)
	{
		$result = $this->insert($table, $columns, $values);

		return $result;
	}

	public function newUpdate(string $table, string $columns, array $values, string $where)
	{
		$result = $this->update($table, $columns, $values, $where);

		return $result;
	}
	
}

?>