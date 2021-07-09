<?php

namespace src\Models\Core;

use src\Models\Core\AbstractModelCore;

class DeleteModel extends AbstractModelCore
{
	function deleteId(int $id)
	{
		$this->callCore->delete($this->table, $this->columns[0] ." = " . $id);
	}

	function deleteWhere(string $where)
	{
		$this->callCore->delete($this->table, $where);
	}
}

?>