<?php

namespace src\Models;
use src\Models\BaseModel;

class Model 
{

	//classe que simplifica e automatiza os models
	
	public $result;

	public function __construct(string $table)
	{
		$model = "\\src\\Models\\". $table."Model";
		$objModel = new $model;

		$arrayModel = $objModel->table();

		$this->sqlSelect($arrayModel, $table);
		
	}

	public function sqlSelect(array $array, string $table)
	{
		$sql = "SELECT ";
		for($i = 0; $i < count($array); $i++)
		{
			$sql .= $array[$i] . " ";
		}

		$sql =  $sql . "FROM " . strtolower($table);
		
		$baseModel = new BaseModel;
		$this->result = $baseModel->find($sql);
	
	}

	function getResult()
	{
		return $this->result;
	}
}
?>