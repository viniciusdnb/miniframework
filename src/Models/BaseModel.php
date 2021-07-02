<?php

namespace src\Models;

use src\Models\CoreModel;


class BaseModel extends CoreModel
{
	public function find(string $sql)
	{
		
		$result = $this->select($sql);
		
		return $result->fetchAll(\PDO::FETCH_CLASS);

	}
}

?>