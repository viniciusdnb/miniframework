<?php

namespace src\Models\Core;

use src\Models\Core\AbstractCallModelCore;

//objeto responsavel por fazer inserção 

class InsertModel extends AbstractModelCore
{
	public function insert(array $values, bool $arr_shift)
	{
		//retuira sempre a primeira posição do arrey sendo a coluna id ta tabela
		if(!$arr_shift)
		{
			array_shift($this->columns);
		}
		
		//prepara as colunas e valores
		$this->preparedColum = $this->prepareColumnsInsert($this->getColumns());
		
		//verifica se na posicao 1 do values contem outro array
		if(is_array($values[1]))
		{
			for($i = 0; $i <  count($values); $i++)
			{
				$this->save($values[$i]);
			}
		}
		else
		{
			$this->save($values);
		}
	
					
	}

	private function save($values)
	{
		//funcao que prepara os valores
		$preparedValues = $this->prepareValues($this->getColumns(), $values);
		
		$this->result = $this->callCore->newInsert($this->table, $this->preparedColum, $preparedValues);
	}

	

}