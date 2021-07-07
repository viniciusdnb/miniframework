<?php

namespace src\Models\Core;

use src\Models\Core\Model;

abstract class AbstractModel
{
	function select(string $where = null)
	{
		$model = new Model($this->table, $this->columns);

		$model->select($where);

		return $model->getResult();
	}
	/**
	 *@param $values: array obrigatorio dados para ser inserido
	 *
	 *@param $arr_shift: boll valor false vai sempre ignorar a primeira coluna passado no model exemplo a coluna de chave primaria auto imcrementada
	 */
	function insert(array $values, bool $arr_shift = false)
	{
		$model = new Model($this->table, $this->columns);
			
		$model->insert($values, $arr_shift);
		
	}
}

?>