<?php

namespace src\Models\Core;


use src\Models\Core\SelectModel;
use src\Models\Core\InsertModel;


abstract class AbstractCallModelCore
{
	function select(string $where = null)
	{
		$model = new SelectModel($this->table, $this->columns);

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
		$model = new InsertModel($this->table, $this->columns);
			
		$model->insert($values, $arr_shift);
		
	}

	function update(array $values, string $where, bool $arr_shift = false)
	{
		$model = new UpdateModel($this->table, $this->columns);

		$model->update($values, $where, $arr_shift);
	}

	/**
	 * @param $var - int fara a operacao de exclusao pela coluna da chave primaria. string fara a opreação de exclusao pela clausura where
	 */
	function delete($var)
	{
		$model = new DeleteModel($this->table, $this->columns);

		if(is_string($var))
		{
			$model->deleteWhere($var);
		}

		if(is_int($var))
		{
			$model->deleteId($var);
		}
	}
}

?>