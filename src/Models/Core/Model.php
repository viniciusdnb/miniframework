<?php

namespace src\Models\Core;

use src\Models\Core\CallCore;

class Model 
{

	//classe que simplifica e automatiza os models
	
	private $result;
	private $callCore;
	private $columns;	
	private $table;

	private $preparedColum;

	public function __construct($table, $columns)
	{
		
	
		$this->table = $table;
		$this->columns = $columns;

		$this->callCore = new CallCore;
		$this->table = $table;
		
		
	}

	public function select($where = null)
	{
		$array = $this->getColumns();
		
		$table = $this->getTable();

		$query = "SELECT ";

		for($i = 0; $i < count($array); $i++)
		{
			$query .= $array[$i] . ", ";
		}
		
		$query = rtrim($query, ", ");
		
		$query .=  " ";
				
		
		$query .= "FROM " . strtolower($table);

		if(!empty($where)){
			$query .= " WHERE " . $where;
		}
				
	$this->result = $this->callCore->find($query);
	
	}


	public function insert(array $values, bool $arr_shift)
	{
		//retuira sempre a primeira posição do arrey sendo a coluna id ta tabela
		if(!$arr_shift)
		{
			array_shift($this->columns);
		}
		
		//prepara as colunas e valores
		$this->preparedColum = $this->prepareColumns($this->getColumns(), $arr_shift);
		
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
		//funcao que inicia o processo de salvamento
		$preparedValues = $this->prepareValues($this->getColumns(), $values);
		
		$this->result = $this->callCore->create($this->table, $this->preparedColum, $preparedValues);
	}

	private function prepareColumns($columns, $arr_shift)
	{
		//insere os dois pontos para a funcao prepare do PDO
		$columns[0] = ":". $columns[0];

		//implode o array de colunas
		return implode(",:", $columns);

	}

	private function prepareValues($columns, $val)
	{
		//cria o array de values preparado inserir 
		$values = [];
	
		for($i = 0; $i < count($columns); $i++)
		{
			$values[":" . $columns[$i]] = $val[$i];
		}

		return $values;
	}

	function update()
	{

	}

	function delete()
	{

	}

	function getResult()
	{
		return $this->result;
	}

	private function getColumns()
	{
		return $this->columns;
	}

	private function getBaseModel()
	{
		return $this->baseModel;
	}

	private function getTable()
	{
		return $this->table;
	}

	private function getPreparedeColumns()
	{
		return $this->prepareColumns;
	}
	function __destruct()
	{
		
	}

}
?>