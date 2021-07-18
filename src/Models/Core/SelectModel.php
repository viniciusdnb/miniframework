<?php

namespace src\Models\Core;

use src\Models\Core\AbstractModelCore;

class SelectModel extends AbstractModelCore
{
	
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
				
		
		$query .= "FROM " . $table;

		if(!empty($where)){
			$query .= " WHERE " . $where;
		}
				
		$this->result = $this->callCore->find($query);
	}


}

?>