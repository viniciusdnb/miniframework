<?php

namespace src\Models;

use src\Models\Core\AbstractCallModelCore;

class PermActionUserModel extends AbstractCallModelCore
{
	protected $table = "permActionUser";

	protected $columns = ["idPermActionUser", "idUser", "descActionPerm"];
}