<?php

namespace src\Models\Core;

use src\Models\Core\AbstractModelCore;

class UpdateModel extends AbstractModelCore
{
	public function update(array $values, string $where, bool $arr_shift)
	{
		//retira sempre a primeira posição do arrey sendo a coluna id ta tabela
		if(!$arr_shift)
		{
			array_shift($this->columns);
		}
		
		$this->preparedColum = $this->prepareColumnsUpdate($this->columns);

		$this->save($values, $where);

	}

	private function save($values, $where)
	{
		$preparedValues = $this->prepareValues($this->getColumns(), $values);

		return $this->callCore->newUpdate($this->table, $this->preparedColum, $preparedValues, $where);
	}
}
