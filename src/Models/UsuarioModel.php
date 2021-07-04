<?php

namespace src\Models;

use src\Models\Core\Model;

class UsuarioModel {

	private $table = "usuario";
	
	private $columns = ["idUsuario", "nome", "email"];
	


	function select(string $where = null)
	{
		$model = new Model($this->table, $this->columns);

		$model->select($where);

		return $model->getResult();
	}

	function insert(array $values, bool $arr_composite, bool $arr_shift = false)
	{
		$model = new Model($this->table, $this->columns);
		
		$model->insert($values, $arr_composite,  $arr_shift);
		
	}
}

?>